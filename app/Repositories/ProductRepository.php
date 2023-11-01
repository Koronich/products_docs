<?php

namespace App\Repositories;

use App\Models\Product;
use App\Services\Models\ProductService;

class ProductRepository extends BaseModelRepository
{
    protected const MODEL_CLASS = Product::class;
}
