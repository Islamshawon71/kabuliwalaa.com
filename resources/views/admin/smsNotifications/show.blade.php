@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smsNotification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sms-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.smsNotification.fields.id') }}
                        </th>
                        <td>
                            {{ $smsNotification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsNotification.fields.number') }}
                        </th>
                        <td>
                            {{ $smsNotification->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsNotification.fields.message') }}
                        </th>
                        <td>
                            {{ $smsNotification->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsNotification.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\SmsNotification::STATUS_SELECT[$smsNotification->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sms-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection