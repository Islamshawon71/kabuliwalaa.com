<?php

namespace App\Http\Requests;

use App\Models\ProductVariation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductVariationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_variation_edit');
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
                'unique:product_variations,content,' . request()->route('product_variation')->id,
            ],
            'product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
