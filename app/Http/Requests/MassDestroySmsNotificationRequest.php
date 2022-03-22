<?php

namespace App\Http\Requests;

use App\Models\SmsNotification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySmsNotificationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sms_notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sms_notifications,id',
        ];
    }
}
