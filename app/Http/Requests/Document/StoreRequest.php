<?php

namespace App\Http\Requests\Document;

use App\Repositories\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->type == 'out') {
            // валидируем по максимально возможному количеству для "ухода"
            $registrations = [];
            foreach ($this->registrations as $id => $reg) {
                $registrations["registrations.$id.product_id"] = [
                    'required',
                    'exists:products,id',
                ];
                $registrations["registrations.$id.count"] = [
                    'required',
                    'integer',
                    'min:0',
                    'max:' . ProductRepository::getById($id)->count,
                ];
            }
        } else {
            $registrations = [
                'registrations'              => [
                    'required',
                    'array',
                ],
                'registrations.*.product_id' => [
                    'required',
                    'exists:products,id',
                ],
                'registrations.*.count'      => [
                    'required',
                    'integer',
                    'min:0',
                ]
            ];
        }

        return array_merge([
            'type' => [
                'required',
                'in:in,out',
            ],
            'date' => [
                'required',
                'date',
            ],
        ],
            $registrations
        );
    }

    public function messages()
    {
        return [
            'registrations.required' => 'Products required. Please add some.'
        ];
    }
}
