<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreRequest;
use App\Services\Models\DocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;

class DocumentController extends Controller
{
    /**
     * @param StoreRequest $request
     *
     * @return JsonResponse|RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            DocumentService::store($request->only(['date', 'type']), $request->registrations);

            return redirect(route('documents.index'));
        } catch (\Exception $e) {
            return Response::json(['errors' => [$e->getMessage()]], 422);
        }
    }
}
