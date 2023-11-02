<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Collection;

class DocumentRepository extends BaseModelRepository
{
    /** @var string class of using model */
    protected const MODEL_CLASS = Document::class;

    /**
     * @param int $docId
     *
     * @return ?Collection
     */
    public static function getWithProducts(int $docId): ?Collection
    {
        return Document::select([
            'documents.*',
            'product_document_registrations.*',
            'products.article',
            'products.name',
            'products.price'
        ])
            ->where('documents.id', $docId)
            ->leftJoin(
                'product_document_registrations',
                'product_document_registrations.document_id',
                'documents.id'
            )
            ->leftJoin('products', 'products.id', 'product_document_registrations.product_id')
            ->get();
    }
}
