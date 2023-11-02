@extends('layouts.main')

@section('content')
    <a class="btn add_btn" href="{{route('products.add')}}">ADD PRODUCT</a>
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
            <tr class="tr_product">
                <td>{{ $product->id }}</td>
                <td>{{ $product->article }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->count }}</td>
                <td>
                    <div class="button_block">
                        <a class="btn edit_btn" href="{{route('products.edit', $product->id)}}"> Edit </a>

                        <form action="{{route('products.delete', $product->id)}}" method="POST">
                            @csrf
                            <button class="btn del_btn" type="submit">
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
