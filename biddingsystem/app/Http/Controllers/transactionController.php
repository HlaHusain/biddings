<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class transactionController extends Controller

{
    public function index()
    {
        try{
            $statusCode = 200;
            $response = [
                'products'  => []
            ];

            $transactions = Transaction::all();

            foreach($transactions as $transaction){

                $response['$transaction'][] = [
                    'id' => $transaction->id,
                    'bidValue' => $transaction->bidValue,
                    'product_id' => $transaction->product_id,
                    'bid_id' => $transaction->bid_id,
                    'user_id' => $transaction->user_id,
                ];
            }

        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }

    }
    public function show($id)
    {
        try{
            $transaction = Transaction::find($id);
            $statusCode = 200;
            $response = [ "transaction" => [
                'id' => $id,
                'bidValue' => $transaction->bidValue,
                'product_id' => $transaction->product_id,
                'bid_id' => $transaction->bid_id,
                'user_id' => $transaction->user_id,
            ]];

        }catch(Exception $e){
            $response = [
                "error" => "transaction doesn`t exists"
            ];
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }

    }
    public function destroy($id){

        $transaction = Transaction::find($id);
        $transaction->delete();
        $response = ['$transaction successfully deleted'];
        return Response::json($response, 200);
    }

    public function store(Request $request){

        $transaction = new Transaction();
        $transaction->bidValue = $request->input('bidValue');
        $transaction->save();

        return response(array(
            'error' => false,
            'message' =>'$transaction created successfully',
        ),200);

    }
    public function update(Request $request,$id){

        $transaction=Transaction::find($id);
        $transaction->bitValue = $request->input('bitValue');
        $transaction->save();

        return response(array(
            'error' => false,
            'message' =>'transaction updated successfully',
        ),200);


    }
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return response(array(
            'error' => false,
            'message' =>'transaction deleted successfully',
        ),200);
    }
}
