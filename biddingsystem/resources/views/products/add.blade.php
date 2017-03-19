
@extends('layouts.app')
@section('content')

    @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach

            </ul>

        </div>
    @endif

    <form action="/api/v1/products/addProduct" method="POST">
        {{csrf_field()}}
        Product Name : <input type="text" name="name" value="{{Request::old('name')}}" placeholder="enter name">
        <br>
        Product Desc : <input type="text" name="desc" value="{{Request::old('desc')}}"  placeholder="enter desc">
        <br>
        Price : <input type="text" name="price" value="{{Request::old('price')}}"  placeholder="enter price">
        <br>
        incUnit : <input type="text" name="incUnit" value="{{Request::old('incUnit')}}"  placeholder="enter incUnit">
        <br>
        period : <input type="text" name="period" value="{{Request::old('period')}}"  placeholder="enter period">
        <br>
        startTime : <input type="text" name="startTime" value="{{Request::old('startTime')}}"  placeholder="enter startTime">
        <br>
        <input type="submit" value="Add Product">

    </form>

@endsection