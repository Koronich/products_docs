<?php

namespace App\Repositories;

use App\Models\Document;

class DocumentRepository extends BaseModelRepository
{
    protected const MODEL_CLASS = Document::class;

    public static function getWithProducts(int $docId)
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
