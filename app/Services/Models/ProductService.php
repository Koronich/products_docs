<?php

namespace App\Services\Models;

use App\Models\Product;

class ProductService extends BaseModelService
{
    /** @var string class of using model */
    protected const MODEL_CLASS = Product::class;
}
