
@extends('layouts.app')
@section('content')
    <?php echo $bid ?>
    <br>
    @foreach($product as $myproduct)


        <tr>
            <td>
                {{'product Name : '  . $myproduct->name}}
            </td>
            <td>
                {{'product Desc : '  . $myproduct->desc}}
            </td>
            {{'product id : '  . $myproduct->id}}
            <td>
                <a href="/api/v1/products/deleteProduct/{{$myproduct->id}}">Delete</a>
            </td>
            <td>
                <a href="/api/v1/products/editProduct/{{$myproduct->id}}">Edit</a>
            </td>

        </tr>
        <br>
        <br>


    @endforeach
    @foreach($bid as $mybid)
        <td>
            {{'product price : '  . $mybid->price}}
        </td>
        <td>
            {{'product incUnit : '  . $mybid->incUnit}}
        </td>
        <td>
            {{'period : '  . $mybid->period}}
        </td>
        <td>
            {{'startTime : '  . $mybid->startTime}}
        </td>
        @endforeach
    <td>
        <a href="/api/v1/products/addProduct/">ADD PRODUCT</a>
    </td>
@endsection