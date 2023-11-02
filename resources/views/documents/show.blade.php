@extends('layouts.main')

@section('content')
    <h1>Document from {{$regs[0]->date}}</h1>
    <p class="field_row">
        <span class="field_name">
            Type:
        </span>
        <span>{{ strtoupper($regs[0]->type) }}</span>
    </p>
    <table>
        <thead>
        <tr>
            <th>Article</th>
            <th>Name</th>
            <th>Price</th>
            <th>Before</th>
            <th>Count</th>
            <th>After</th>
            <th>Sum</th>
        </tr>
        </thead>
        <tbody>
        @foreach($regs as $product)
            <tr class="tr_product">
                <td>{{ $product->article }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->old }}</td>
                <td>{{ $product->count }}</td>
                <td>{{ $product->new }}</td>
                <td>{{ $product->count * $product->price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
