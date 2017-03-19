@extends('layouts.app')
@section('content')
    <form action="/api/v1/products/editProduct/{{$product->id}}" method="POST">
        {{csrf_field()}}
        Product Name : <input type="text" name="name" value='{{$product->name}}' placeholder="enter name">
        <br>
        Product Desc : <input type="text" name="desc" value='{{$product->desc}}' placeholder="enter desc">
        <br>
        Price : <input type="text" name="price" value='{{$bid->price}}' placeholder="enter price">
        <br>
        incUnit : <input type="text" name="incUnit" value='{{$bid->incUnit}}' placeholder="enter incUnit">
        <br>
        period : <input type="text" name="period" value='{{$bid->period}}' placeholder="enter period">
        <br>
        startTime : <input type="text" name="startTime" value='{{$bid->startTime}}' placeholder="enter startTime">
        <br>

        <input type="submit" value="edit Product">
    </form>
@endsection
