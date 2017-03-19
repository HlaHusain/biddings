
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
            <form action="/api/v1/product/{{$product->id}}" method="DELETE">
                {{csrf_field()}}
            <td>
                <input type="submit" value="delete Product">
            </td>
            </form>
            <td>
                <a href="product/{{$myproduct->id}}">Edit</a>
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
        <a href="product">ADD PRODUCT</a>
    </td>
@endsection