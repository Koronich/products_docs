<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Repositories\ProductRepository;
use App\Services\Models\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => ProductRepository::all()]);
    }

    public function add()
    {
        return view('products.add');
    }

    public function store(StoreRequest $request)
    {
        ProductService::create($request->validated());

        return redirect(route('products.index'));
    }

    public function edit(Request $request)
    {
        return view('products.edit', [
            'product' => ProductRepository::getById($request->id)
        ]);
    }

    public function update(int $id, UpdateRequest $request)
    {
        ProductService::update($id, $request->validated());

        return redirect(route('products.index'));
    }

    public function delete(int $id)
    {
        ProductService::delete($id);

        return redirect(route('products.index'));
    }
}
