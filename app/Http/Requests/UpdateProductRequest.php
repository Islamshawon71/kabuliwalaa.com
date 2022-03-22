<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:products,slug,' . request()->route('product')->id,
            ],
            'code' => [
                'string',
                'required',
            ],
            'regular_price' => [
                'required',
            ],
            'sale_price' => [
                'string',
                'nullable',
            ],
            'description' => [
                'required',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'required',
                'array',
            ],
            'photo' => [
                'array',
            ],
            'priority' => [
                'string',
                'nullable',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
