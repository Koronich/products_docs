<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;
use App\Repositories\ProductRepository;

class DocumentController extends Controller
{
    public function index()
    {
        return view('documents.index', ['documents' => DocumentRepository::all()]);
    }

    public function show(int $id)
    {
        return view('documents.show', ['regs' => DocumentRepository::getWithProducts($id)]);
    }

    public function add()
    {
        return view('documents.add', ['products' => ProductRepository::all()]);
    }
}
