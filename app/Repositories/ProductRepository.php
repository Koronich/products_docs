<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseModelRepository
{
    /** @var string class of using model */
    protected const MODEL_CLASS = Product::class;
}
