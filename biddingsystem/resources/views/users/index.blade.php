
@extends('layouts.app')
@section('content')


    <form action="/api/v1/user" method="POST">
        {{csrf_field()}}
        user Name : <input type="text" name="name"  placeholder="enter name">
        <br>
        Password : <input type="text" name="pass"  placeholder="enter Password">
        <br>

        <input type="submit" value="login">
    </form>


@endsection
