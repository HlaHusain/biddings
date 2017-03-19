

@extends('layouts.app')
@section('content')

    <br>
@foreach($transactions as $transaction)
    <td>
        {{'product id : '  . $transaction->product_id}}
    </td>
    <td>
        {{'product bids : '  . $transaction->bid_id}}
    </td>
    <td>
        {{'product bidValue : '  . $transaction->bidValue}}
    </td>

   <br>
    <br>
@endforeach
@endsection