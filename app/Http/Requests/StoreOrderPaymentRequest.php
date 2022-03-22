<?php

namespace App\Http\Requests;

use App\Models\OrderPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_payment_create');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'payment_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'string',
                'required',
            ],
            'transaction_number' => [
                'string',
                'nullable',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
