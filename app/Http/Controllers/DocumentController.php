<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DocumentController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('documents.index', ['documents' => DocumentRepository::all()]);
    }

    /**
     * @param int $id
     *
     * @return Factory|View|Application
     */
    public function show(int $id): Factory|View|Application
    {
        return view('documents.show', ['regs' => DocumentRepository::getWithProducts($id)]);
    }

    /**
     * @return Application|Factory|View
     */
    public function add(): View|Factory|Application
    {
        return view('documents.add', ['products' => ProductRepository::all()]);
    }
}
