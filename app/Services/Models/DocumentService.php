<?php

namespace App\Services\Models;

use App\Models\Document;
use App\Repositories\ProductRepository;
use Exception;

class DocumentService extends BaseModelService
{
    protected const MODEL_CLASS = Document::class;

    /**
     * @param array $fields
     * @param array $registrations
     * @throws Exception
     */
    public static function store(array $fields, array $registrations)
    {
        $document = self::create($fields);

        foreach ($registrations as $id => $reg) {
            $product = ProductRepository::getById($id);

            if ($document->type == 'out' && $product->count < $reg['count']) {
                throw new Exception("Can't get out {$reg['count']} from $product->name. Max: $product->count");
            }

            $new = $document->type == 'out' ? $product->count - $reg['count'] : $product->count + $reg['count'];
            ProductDocumentRegistrationService::create([
                'product_id'  => $product->id,
                'document_id' => $document->id,
                'old'         => $product->count,
                'count'       => $reg['count'],
                'new'         => $new,
            ]);

            $product->update(['count' => $new]);
        }
    }
}
