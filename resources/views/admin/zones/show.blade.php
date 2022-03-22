@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zone.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.id') }}
                        </th>
                        <td>
                            {{ $zone->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.courier_name') }}
                        </th>
                        <td>
                            {{ $zone->courier_name->courier_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.city_name') }}
                        </th>
                        <td>
                            {{ $zone->city_name->city_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.zone_name') }}
                        </th>
                        <td>
                            {{ $zone->zone_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Zone::STATUS_SELECT[$zone->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.extra') }}
                        </th>
                        <td>
                            {{ $zone->extra }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection