@extends('layouts.main')

@section('content')
    <h1>Adding Document</h1>
    @if(isset($request))
        @dump($request)
    @endif
    <form id="document_form" action="{{route('documents.store')}}" method="POST">
        @csrf
        <select id="type" name="type" placeholder="select type" required>
            <option disabled selected>Choose Doc Type</option>
            <option value="in">IN</option>
            <option value="out">OUT</option>
        </select>
        <input type="date" name="date" placeholder="date" required>

        <select id="current_product" placeholder="Add Product">
            <option selected>Add Product</option>
            @foreach($products as $product)
                <option
                    id="{{$product->article}}"
                    class="add_product"
                    value="{{$product}}"
                >
                    {{$product->name}} ({{$product->count}})
                </option>
            @endforeach
        </select>

        <div id="errors_block" class="alert alert-danger" hidden>
            <ul id="errors_list">
            </ul>
        </div>

        <table class="registrations_table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Article</th>
                <th>Name</th>
                <th>Count</th>
                <th>Remove</th>
            </tr>
            </thead>
            <tbody id="registrations">
            </tbody>
        </table>

        <button class="btn submit" type="submit">Store Document</button>
    </form>

    <script>
        $(document).ready(function () {
            $("#document_form").on('submit', function (e) {
                e.preventDefault();

                let form = $(this);
                let actionUrl = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form.serialize(), // serializes the form's elements.
                    success: function () {
                        window.location.replace('/documents');
                    },
                    error: function (xhr, textStatus) {
                        $('#errors_list').empty()
                        for (fieldErrors in xhr.responseJSON.errors) {
                            for (error in xhr.responseJSON.errors[fieldErrors]) {
                                $('#errors_list').append(`<li>${xhr.responseJSON.errors[fieldErrors][error]}</li>`)
                            }
                        }
                        $('#errors_block').removeAttr('hidden')
                    }
                });

            });
        })
        $('#current_product').on('change', function () {
            let product = JSON.parse($('#current_product').val());
            let delBtnID = `del_${product.id}`;
            let rowId = `row_${product.id}`;

            $('#registrations').append(
                $(`<tr id="${rowId}" class="tr_registration">
                        <td>${product.id}<input hidden name="registrations[${product.id}][product_id]" value="${product.id}"></td>
                        <td>${product.article}</td>
                        <td>${product.name}</td>
                        <td><input name="registrations[${product.id}][count]" type="number" step="1" min="0" value="0"></td>
                        <td><button id="${delBtnID}" class="btn del_btn"> - </button></td>
                    </tr>`)
            );
            // выключаем выбранный элемент
            $(`#${product.article}`).attr('disabled', 'disabled');
            $('#current_product option:first').prop('selected', true);

            // вешаем на клик код для удаления строки
            let deleteBtn = $(`#${delBtnID}`);
            deleteBtn.on('click', function () {
                $(`#${rowId}`).remove();
                $(`#${product.article}`).removeAttr('disabled');
            })
        });
    </script>
@stop
