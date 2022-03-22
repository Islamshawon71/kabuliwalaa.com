<?php

namespace App\Http\Requests;

use App\Models\OrderNotification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_notification_edit');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'message' => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
