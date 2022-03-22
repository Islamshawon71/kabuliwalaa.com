<?php

namespace App\Http\Requests;

use App\Models\SmsNotification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSmsNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sms_notification_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'string',
                'required',
            ],
            'message' => [
                'string',
                'required',
            ],
        ];
    }
}
