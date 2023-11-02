<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property int $document_id
 * @property int $old   Было единиц товара
 * @property int $count Изменение на
 * @property int $new   Стало единиц товара
 */
class ProductDocumentRegistration extends Model
{
    use HasFactory;

    protected $table = 'product_document_registrations';

    protected $fillable = [
        'product_id',
        'document_id',
        'old',
        'count',
        'new',
    ];
}
