@extends('layouts.main')

@section('content')
    <a href="{{route('products.add')}}">ADD PRODUCT</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Article</th>
            <th>Name</th>
            <th>Price</th>
            <th>Count</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->article }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->count }}</td>
                <td>
                    <div>
                        <a href="{{route('products.edit', $product->id)}}"> Edit </a>

                        <form action="{{route('products.delete', $product->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                DELETE
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
