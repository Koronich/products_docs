@extends('layouts.main')

@section('content')
    <h1>Adding Product</h1>
    <form id="product_form" action="{{route('products.store')}}" method="POST">
        @csrf
        <input type="text" name="article" placeholder="article">
        <input type="text" name="name" placeholder="name">
        <input type="number" step="0.01" min="0" name="price" placeholder="price">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button class="btn submit" type="submit">Store Product</button>
    </form>
@stop
