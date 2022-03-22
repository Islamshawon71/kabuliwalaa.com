<?php

namespace App\Http\Requests;

use App\Models\Courier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('courier_create');
    }

    public function rules()
    {
        return [
            'courier_name' => [
                'string',
                'required',
            ],
            'delivery_charge' => [
                'string',
                'nullable',
            ],
        ];
    }
}
