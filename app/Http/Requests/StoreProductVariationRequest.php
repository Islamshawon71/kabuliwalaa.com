<?php

namespace App\Http\Requests;

use App\Models\ProductVariation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductVariationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_variation_create');
    }

    public function rules()
    {
        return [
            'product_variation_type' => [
                'required',
            ],
            'content' => [
                'string',
                'required',
                'unique:product_variations',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
