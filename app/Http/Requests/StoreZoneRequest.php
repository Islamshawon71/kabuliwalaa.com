<?php

namespace App\Http\Requests;

use App\Models\Zone;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreZoneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zone_create');
    }

    public function rules()
    {
        return [
            'courier_name_id' => [
                'required',
                'integer',
            ],
            'city_name_id' => [
                'required',
                'integer',
            ],
            'zone_name' => [
                'string',
                'required',
            ],
            'extra' => [
                'string',
                'nullable',
            ],
        ];
    }
}
