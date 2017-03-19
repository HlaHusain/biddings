<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class mainController extends Controller
{
    //show all bids
    public function index()
    {

        $products = Product::all();
        $bids = Bid::all();
        $arr = Array('product' => $products, 'bid' => $bids);


        return view('products.index', $arr);

    }

// show bids => $id
    public function show($id)
    {


        $product = Product::find($id);
        return response(array(
            'error' => false,
            //'products' =>$product->toArray(),
        ), 200);

    }

//admin create bids
    public function create(Request $request)
    {

        if ($request->isMethod('post')) {
            $newproduct = new Product();

            $newproduct->name = $request->input('name');
            $newproduct->desc = $request->input('desc');
            $newproduct->save();


            $newbid = new Bid();
            $newbid->product_id = $newproduct->id;
            $newbid->price = $request->input('price');
            $newbid->incUnit = $request->input('incUnit');
            $newbid->period = $request->input('period');
            $newbid->startTime =$request->input('startTime') ;
            $newbid->status =$request->input('status') ;
            $newbid->isdeleted = 0;
            $newbid->save();
//
//
        }
        $response=$newproduct->id;
        return Response::json($response);

      //  return view('products.add');



    }

//admin update bid
    public function update(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $product = Product::find($id);
            $bid = Bid::where('product_id', $id)->first();

            $product->name = $request->input('name');
            $product->desc = $request->input('desc');

            $bid->price = $request->input('price');
            $bid->incUnit = $request->input('incUnit');
            $bid->period = $request->input('period');
            $product->save();
            $bid->save();

            return redirect("api/v1/products");
        } else {
            try {
                $statusCode = 200;
                $product = Product::find($id);
                $bid = Bid::where('product_id', $id)->first();


                $response['product'][] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'desc' => $product->desc,
                    'isdeleted' => $product->isdeleted,
                ];
                $response['bid'][] = [
                    'id' => $bid->id,
                    'price' => $bid->price,
                    'incUnit' => $bid->incUnit,
                    'period' => $bid->period,
                    'startTime' => $bid->startTime,
                ];

            } catch (Exception $e) {
                $statusCode = 400;
            } finally {
                return Response::json($response, $statusCode);
            }


//            $arr = Array('product' => $product, 'bid' => $bid);
//            return view('products.edit', $arr);
        }


    }

    public function delete($id)
    {
        $product = Product::find($id);

        $bid = Bid::where('product_id', $product->id)->first();
        echo $bid;
        $product->delete();
        $bid->delete();
    }

//bid product
    public function bidProduct(Request $request)
    {

        if ($request->isMethod('post')) {
            $bid_id=  $request->input('BidID');
            $product_id = Bid::where('id', $bid_id)->value('product_id');
            $username=  $request->input('username');
            echo $username;

            DB::transaction(function () use ($request, $product_id, $bid_id,$username) {

              //  $userName = Session::get('name');
                $userId = User::where('name', $username)->lockForUpdate()->value('id');
                echo $userId;

                $newTransaction = new Transaction();
                $newTransaction->bidValue = $request->input('newPrice');
                $newTransaction->product_id = $product_id;
                $newTransaction->bid_id = $bid_id;
                // $userId=Session::get('id');
                $newTransaction->user_id = $userId;
                $newTransaction->save();
                DB::commit();
            });
            $response='success';
            return Response::json($response);

        }
        return redirect("api/v1/products/Uindex");
    }

//return current bids
    public function Uindex()
    {

//        $userName = Session::get('name');
        //  echo 'userName' . $userName;
        try {
            $statusCode = 200;
            $bids = Bid::where('isdeleted', 0)->get();

            foreach ($bids as $bid) {
                $productName = Product::where('id', $bid->product_id)->value('name');
                $productDesc = Product::where('id', $bid->product_id)->value('desc');
                $maxCurrentBid = Transaction::where('product_id', $bid->product_id)->max('bidValue');



                $response [] = [
                    'id' => $bid->id,
                    'price' => $bid->price,
                    'incUnit' => $bid->incUnit,
                    'period' => $bid->period,
                    'startTime' => $bid->startTime,
                    'winner_id' => $bid->winner_id,
                    'productName' => $productName,
                    'productDesc' => $productDesc,
                    'maxCurrentBid' => $maxCurrentBid,

                ];

            }

//            $arr = Array('bids' => $bids);
//            return view('products.Uview', $arr);


        } catch (Exception $e) {
            $statusCode = 400;
        }
        return Response::json($response, $statusCode);


//

    }


    //return user closed bids
    public function myclosedbids(Request $request)
    {

            try {
                $statusCode = 200;
                //$userId=Session::get('id');
//                $userName = Session::get('name');
                $username=  $request->input('username');
                $userId = User::where('name', $username)->value('id');
                $transactions = Transaction::where('user_id', $userId)->where('isdeleted', 1)->get();


                foreach ($transactions as $transaction) {
                    $productName = Product::where('id', $transaction->product_id)->value('name');
                    $productDesc = Product::where('id', $transaction->product_id)->value('desc');
                    $Particpant = Transaction::where('product_id', $transaction->product_id)->get();
                    $winnerid = Bid::where('product_id', $transaction->product_id)->where('isdeleted', 1)->value('winner_id');
                    $maxCurrentBid = Transaction::where('product_id', $transaction->product_id)->max('bidValue');
                    $winnerName = User::where('id', $winnerid)->value('name');
                    $numofParticpant = count($Particpant);

                    $response[] = [
                        'id' => $transaction->id,
                        'bidValue' => $transaction->bidValue,
                        'isdeleted' => $transaction->isdeleted,
                        'product_id' => $transaction->product_id,
                        'bid_id' => $transaction->bid_id,
                        'user_id' => $transaction->user_id,
                        'productName' => $productName,
                        'productDesc' => $productDesc,
                        'maxBid' => $maxCurrentBid,
                        'winnerName' => $winnerName

                    ];
                }
            }
            catch (Exception $e) {
                $statusCode = 400;
            } finally {
                return Response::json($response, $statusCode);
            }


//        $arr = Array('transactions' => $transactions);
//        return view('products.mybids', $arr);

    }

//return user open bids
    public function mybids(Request $request)
    {
        try {
            //$userId=Session::get('id');
            //$userName = Session::get('name');
            $username=  $request->input('username');
            $userId = User::where('name',$username )->value('id');
            $transactions = Transaction::where('user_id', $userId)->where('isdeleted', 0)->get();

            $statusCode = 200;

            foreach ($transactions as $transaction) {
                $productName = Product::where('id', $transaction->product_id)->value('name');
                $productDesc = Product::where('id', $transaction->product_id)->value('desc');
                $Particpant = Transaction::where('product_id', $transaction->product_id)->get();
                $maxCurrentBid = Transaction::where('product_id', $transaction->product_id)->max('bidValue');
                $numofParticpant = count($Particpant);
                $response[] = [
                    'id' => $transaction->id,
                    'bidValue' => $transaction->bidValue,
                    'isdeleted' => $transaction->isdeleted,
                    'product_id' => $transaction->product_id,
                    'bid_id' => $transaction->bid_id,
                    'user_id' => $transaction->user_id,
                    'productName' => $productName,
                    'productDesc' => $productDesc,
                    'maxBid' => $maxCurrentBid,
                    'numofParticpant'=> $numofParticpant,
                    'transaction' =>$transaction


                ];
            }
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }


//        $arr = Array('transactions' => $transactions);
//        return view('products.mybids', $arr);

    }


//check if bids time is over and closed bids
    public function checkTime()
    {

        $bids = Bid::where("isdeleted", 0)->get();
        //echo $bids . "<br> <br>";
        foreach ($bids as $bid) {
            $startTime = $bid->startTime;
            $period = $bid->period;
            $startTimeSec = strtotime($startTime);
            $periodSec = $period * 60 * 60;
            $endSec = $startTimeSec + $periodSec;
            $end = gmdate("y-m-d H:i:s", $endSec);
            echo "end Time" . $end . "</br>";
            $saveTime = strtotime($end);
            $thisTime = time(); // Current time
            echo "this Time:" . gmdate("y-m-d H:i:s", $thisTime) . "<br>";
            $diffTime = ($saveTime - $thisTime); // Difference in time

            if ($diffTime >= 1) {
                echo 'Time remaining until next run is in ' . gmdate("H:i:s", $diffTime) . "<br>";

            } else {
                echo 'Timer expired.' . "<br>";
                echo 'bid_id' . $bid->id;

                $bid->isdeleted = 1;
                $bid->winner_id = $this->claculateWinnerid($bid->id);
                echo $bid->winner_id;
                $bid->save();
                $transactions = Transaction::where('bid_id', $bid->id)->get();
                foreach ($transactions as $transaction) {
                    $transaction->isdeleted = 1;
                    $transaction->save();
                }


            }


        }


    }

//return winnerID
    public function claculateWinnerid($id)
    {

        $Particpant = Transaction::where("bid_id", $id)->get();
        $maxBid = Transaction::where('bid_id', $id)->max('bidValue');
        $winnerId = Transaction::where('bidValue', $maxBid)->value('user_id');

        echo "bid id" . $id . "<br>";
        echo 'Particpant' . count($Particpant) . "<br>";
        echo '$maxBid' . $maxBid . "<br>";
        echo '$Bid' . $winnerId . "<br>";
        return $winnerId;

    }

//return closed bids for admin
    public function closedbids()
    {


        {
            try {
                $statusCode = 200;
                //$userId=Session::get('id');
                $bids = Bid::where('isdeleted', 1)->get();

                foreach ($bids as $bid) {
                    $winnerid = $bid->winner_id;
                    $bestBid = Transaction::where('user_id', $winnerid)->where('product_id', $bid->product_id)->value('bidValue');
                    $winnerName = User::where('id', $winnerid)->value('name');
                    $productName = Product::where('id', $bid->product_id)->value('name');
                    $productDesc = Product::where('id', $bid->product_id)->value('desc');
                    $Particpant = Transaction::where('product_id', $bid->product_id)->get();
                    $numofParticpant = count($Particpant);

                    $response[]= [
                        'id' => $bid->id,
                        'price' => $bid->price,
                        'incUnit' => $bid->incUnit,
                        'period' => $bid->period,
                        'startTime' => $bid->startTime,
                        'winner_id' => $bid->winner_id,
                        'isdeleted' => $bid->isdeleted,
                        'bestBid' => $bestBid,
                        'productName' => $productName,
                        'productDesc' => $productDesc,
                        'winnerName' => $winnerName,
                        'numofParticpant'=>$numofParticpant


                    ];


                }

            } catch (Exception $e) {
                $statusCode = 400;
            } finally {
                return Response::json($response, $statusCode);
            }


//        $arr = Array('transactions' => $transactions);
//        return view('products.mybids', $arr);
        }

    }

//return running bids for admin
    public function runningbids()
    {

        {
            try {
                $statusCode = 200;
                $bids = Bid::where('isdeleted', 0)->where('status','true')->get();



                foreach ($bids as $bid) {
                    $ParticpantId = Transaction::where('product_id', $bid->product_id)->value('id');
                    $bidValue = Transaction::where('product_id', $bid->product_id)->value('bidValue');
                    $username = User::where('id', $ParticpantId)->value('name');
                    $productName = Product::where('id', $bid->product_id)->value('name');
                    $productDesc = Product::where('id', $bid->product_id)->value('desc');
                    $Particpant = Transaction::where('product_id', $bid->product_id)->get();
                    $maxCurrentBid = Transaction::where('product_id', $bid->product_id)->max('bidValue');
                    $numofParticpant = count($Particpant);

                    $response[] = [
                        'id' => $bid->id,
                        '$ParticpantId' =>$ParticpantId,
                        'price' => $bid->price,
                        'incUnit' => $bid->incUnit,
                        'period' => $bid->period,
                        'startTime' => $bid->startTime,
                        'winner_id' => $bid->winner_id,
                        'isdeleted' => $bid->isdeleted,
                        'ParticpantName' => $username,
                        'BidValue' => $bidValue,
                        'productName' => $productName,
                        'productDesc' => $productDesc,
                        'Particpant' => $Particpant,
                        'maxCurrentBid' => $maxCurrentBid,
                        'numofParticpant' => $numofParticpant

                    ];


                }
            } catch (Exception $e) {
                $statusCode = 400;
            } finally {
                return Response::json($response, $statusCode);
            }


//        $arr = Array('transactions' => $transactions);
//        return view('products.mybids', $arr);
        }

    }



    public function history()
    {

        try {
            $statusCode = 200;
            $transactions = Transaction::all();

            foreach ($transactions as $transaction) {
                $productName = Product::where('id', $transaction->product_id)->value('name');
                $productDesc = Product::where('id', $transaction->product_id)->value('desc');
                $transactions = Transaction::all();
                $userName = User::where('id', $transaction->user_id )->value('name');


                $response [] = [
                    'id' => $transaction->id,
                    'bidValue' => $transaction->bidValue,
                    'product_id' => $transaction->product_id,
                    'bid_id' => $transaction->bid_id,
                    'user_id' => $transaction->user_id,
                    'productName' => $productName,
                    'productDesc' => $productDesc,
                    'user_name' =>$userName

                ];

            }

        } catch (Exception $e) {
            $statusCode = 400;
        }
        return Response::json($response, $statusCode);


    }

    public function close(Request $request)
    {

        if ($request->isMethod('post')) {

            $bid = Bid::where('id', $request->input('id'))->first();
            echo 'Timer expired.' . "<br>";

            $bid->isdeleted = 1;
            $bid->winner_id = $this->claculateWinnerid($request->input('id'));
            $bid->save();
            $transactions = Transaction::where('bid_id', $request->input('id'))->get();
            foreach ($transactions as $transaction) {
                $transaction->isdeleted = 1;
                $transaction->save();

            }


        }


    }

    public function getUnstatrted(){
        $bids = Bid::where('status', 'false')->get();

        foreach ($bids as $bid) {
            $productName = Product::where('id', $bid->product_id)->value('name');
            $productDesc = Product::where('id', $bid->product_id)->value('desc');



            $response [] = [
                'id' => $bid->id,
                'price' => $bid->price,
                'incUnit' => $bid->incUnit,
                'period' => $bid->period,
                'startTime' => $bid->startTime,
                'productName' => $productName,
                'productDesc' => $productDesc,


            ];

        }

        return Response::json($response);
    }

    public function changeToStarted(Request $request){
        $bid = Bid::where('id', $request->input('id'))->first();
        $bid->status = 'true';
        $bid->save();


    }

}