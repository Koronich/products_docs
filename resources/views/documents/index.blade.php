@extends('layouts.main')

@section('content')
    <a class="btn add_btn" href="{{route('documents.add')}}">ADD DOCUMENT</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                <td>{{ $document->date }}</td>
                <td>{{ $document->type }}</td>
                <td>
                    <div class="button_block">
                        <a class="btn edit_btn" href="{{route('documents.show', $document->id)}}"> Show </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
