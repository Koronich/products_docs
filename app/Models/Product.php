<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property string $article
 * @property string $name
 * @property int    $count
 * @property double $price
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'article',
        'name',
        'count',
        'price',
    ];
}
