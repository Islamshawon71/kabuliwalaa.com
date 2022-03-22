@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.orderNotification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.orderNotification.fields.id') }}
                        </th>
                        <td>
                            {{ $orderNotification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderNotification.fields.order') }}
                        </th>
                        <td>
                            {{ $orderNotification->order->invoice ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderNotification.fields.message') }}
                        </th>
                        <td>
                            {{ $orderNotification->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderNotification.fields.user') }}
                        </th>
                        <td>
                            {{ $orderNotification->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderNotification.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\OrderNotification::STATUS_SELECT[$orderNotification->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection