<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class productController extends Controller
{
    public function index()
    {
        try{
            $statusCode = 200;
            $response = [
                'products'  => []
            ];

            $products = Product::all();

            foreach($products as $product){

                $response['products'][] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'desc' => $product->desc
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
            $product = Product::find($id);
            $statusCode = 200;
            $response = [ "product" => [
                'id' => (int) $id,
                'name' => $product->name,
                'desc' => $product->desc
            ]];

        }catch(Exception $e){
            $response = [
                "error" => "product doesn`t exists"
            ];
            $statusCode = 404;
        }finally{
            return Response::json($response, $statusCode);
        }

    }
public function destroy($id){

        $product = Product::find($id);
        $product->delete();
        $response = ['product successfully deleted'];
        return Response::json($response, 200);
}

public function store(Request $request){

        $newproduct = new Product();

        $newproduct->name = $request->input('name');
        $newproduct->desc = $request->input('desc');
        $newproduct->save();

    return response(array(
        'error' => false,
        'message' =>'Product created successfully',
    ),200);

}
public function update(Request $request,$id){

        $product=Product::find($id);
        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->save();

    return response(array(
        'error' => false,
        'message' =>'Product updated successfully',
    ),200);


}
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response(array(
            'error' => false,
            'message' =>'Product deleted successfully',
        ),200);
    }
}
