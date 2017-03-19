<?php

namespace App\Http\Controllers;

use App\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class bidController extends Controller
{
    public function index()
    {
        try{
            $statusCode = 200;
            $response = [
                'bids'  => []
            ];

            $bids = Bid::all();

            foreach($bids as $bid){

                $response['bid'][] = [
                    'id' => $bid->id,
                    'price' => $bid->price,
                    'incUnit' => $bid->incUnit,
                    'period' => $bid->period,
                    'startTime' => $bid->startTime,
                    'winner_id' => $bid->winner_id
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
            $bid = Bid::find($id);
            $statusCode = 200;
            $response = [ "bid" => [
                'id' => $bid->id,
                'price' => $bid->price,
                'incUnit' => $bid->incUnit,
                'period' => $bid->period,
                'startTime' => $bid->startTime,
                'winner_id' => $bid->winner_id
            ]];

        }catch(Exception $e){
            $response = [
                "error" => "bid doesn`t exists"
            ];
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }

    }
    public function destroy($id){

        $bid = Bid::find($id);
        $bid->delete();
        $response = ['bid successfully deleted'];
        return Response::json($response, 200);
    }

    public function store(Request $request){

        $bid = new Bid();
        $bid->price = $request->input('price');
        $bid->incUnit = $request->input('incUnit');
        $bid->period = $request->input('period');
        $bid->startTime = $request->input('startTime');
        $bid->save();

        return response(array(
            'error' => false,
            'message' =>'bid created successfully',
        ),200);

    }
    public function update(Request $request,$id){

        $bid=Bid::find($id);
        $bid->price = $request->input('price');
        $bid->incUnit = $request->input('incUnit');
        $bid->period = $request->input('period');
        $bid->startTime = $request->input('startTime');
        $bid->save();

        return response(array(
            'error' => false,
            'message' =>'bid updated successfully',
        ),200);


    }
    public function delete($id)
    {
        $bid = Bid::find($id);
        $bid->delete();
        return response(array(
            'error' => false,
            'message' =>'bid deleted successfully',
        ),200);
    }
}
