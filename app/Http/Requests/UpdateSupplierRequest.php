<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supplier_edit');
    }

    public function rules()
    {
        return [
            'supplier_name' => [
                'string',
                'required',
            ],
            'supplier_phone' => [
                'string',
                'required',
            ],
        ];
    }
}
