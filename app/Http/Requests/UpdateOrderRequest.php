<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'wpid' => [
                'string',
                'nullable',
            ],
            'invoice' => [
                'string',
                'required',
                'unique:orders,invoice,' . request()->route('order')->id,
            ],
            'memo' => [
                'string',
                'nullable',
            ],
            'courier_id' => [
                'required',
                'integer',
            ],
            'delivery' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'discount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'paid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'confirm_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'delivery_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'complete_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'required',
            ],
            'note' => [
                'string',
                'nullable',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'customer_id' => [
                'required',
                'integer',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'required',
                'array',
            ],
        ];
    }
}
