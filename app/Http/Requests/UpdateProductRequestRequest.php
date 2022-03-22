<?php

namespace App\Http\Requests;

use App\Models\ProductRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_request_edit');
    }

    public function rules()
    {
        return [
            'products.*' => [
                'integer',
            ],
            'products' => [
                'required',
                'array',
            ],
            'customer_name' => [
                'string',
                'required',
            ],
            'customer_phone' => [
                'string',
                'required',
            ],
            'customer_address' => [
                'string',
                'required',
            ],
        ];
    }
}
