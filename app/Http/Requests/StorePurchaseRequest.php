<?php

namespace App\Http\Requests;

use App\Models\Purchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'memo' => [
                'string',
                'required',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'supplier_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
