<?php

namespace App\Http\Requests;

use App\Models\ProductCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:product_categories,name,' . request()->route('product_category')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:product_categories,slug,' . request()->route('product_category')->id,
            ],
        ];
    }
}
