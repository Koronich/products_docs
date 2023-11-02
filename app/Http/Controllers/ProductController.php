<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Repositories\ProductRepository;
use App\Services\Models\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('products.index', ['products' => ProductRepository::all()]);
    }

    /**
     * @return Application|Factory|View
     */
    public function add()
    {
        return view('products.add');
    }

    /**
     * @param StoreRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreRequest $request): Redirector|RedirectResponse|Application
    {
        ProductService::create($request->validated());

        return redirect(route('products.index'));
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function edit(Request $request): View|Factory|Application
    {
        return view('products.edit', [
            'product' => ProductRepository::getById($request->id)
        ]);
    }

    /**
     * @param int           $id
     * @param UpdateRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function update(int $id, UpdateRequest $request): Redirector|RedirectResponse|Application
    {
        ProductService::update($id, $request->validated());

        return redirect(route('products.index'));
    }

    /**
     * @param int $id
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(int $id): Redirector|RedirectResponse|Application
    {
        ProductService::delete($id);

        return redirect(route('products.index'));
    }
}
