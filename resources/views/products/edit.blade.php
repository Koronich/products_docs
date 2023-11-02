@extends('layouts.main')

@section('content')
    <h1>Editing {{$product->article}} {{$product->name}}</h1>
    <form id="product_form" action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        {{--        <input hidden name="id" value="{{$product->id}}">--}}
        <input type="text" name="name" placeholder="name" value="{{$product->name}}">
        <input type="number" step="0.01" min="0" name="price" placeholder="price" value="{{$product->price}}">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Update Product</button>
    </form>
@stop
