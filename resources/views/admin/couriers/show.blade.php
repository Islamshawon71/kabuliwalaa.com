@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.couriers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courier.fields.id') }}
                        </th>
                        <td>
                            {{ $courier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courier.fields.courier_name') }}
                        </th>
                        <td>
                            {{ $courier->courier_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courier.fields.city_available') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $courier->city_available ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courier.fields.zone_available') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $courier->zone_available ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courier.fields.delivery_charge') }}
                        </th>
                        <td>
                            {{ $courier->delivery_charge }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courier.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Courier::STATUS_SELECT[$courier->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.couriers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection