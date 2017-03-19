
@extends('layouts.app')
@section('content')
    <br>
    @foreach($bids as $bid)

        <tr>

            <td>
                {{'product Price : '  . $bid->price}}
            </td>
            <td>
                {{'product incUnit : '  . $bid->incUnit}}
            </td>
            <td>
                {{'product period : '  . $bid->period}}
            </td>
            <td>
                {{'product period : '  . $bid->startTime}}
            </td>
            <br>
            <br>
            <?php
            $Particpant=\App\Transaction::where('product_id',$bid->product_id)->get();
            $maxBid=\App\Transaction::where('product_id',$bid->product_id)->max('bidValue');
            echo count($Particpant) . "<br>" . $Particpant . "<br>";

            echo $maxBid;

            $userName=Session::get('name');
            echo 'name' . $userName;

                ?>


            <form action="/api/v1/products/bidProduct/{{$bid->product_id}}/{{$bid->id}}" method="POST">
                {{csrf_field()}}
                <td>
                    <input type="text" name="bidValue" placeholder="Enter bid Value">
                </td>
                <td>
                    <input type="submit" value="Bid Product">

                </td>
            </form>
        </tr>
        <br>


    @endforeach
    <td>
        <a href="/api/v1/products/mybids">mybids</a>
    </td>
@endsection