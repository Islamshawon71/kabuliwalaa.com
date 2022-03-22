@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.city.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.id') }}
                        </th>
                        <td>
                            {{ $city->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.courier_name') }}
                        </th>
                        <td>
                            {{ $city->courier_name->courier_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.city_name') }}
                        </th>
                        <td>
                            {{ $city->city_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\City::STATUS_SELECT[$city->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.extras') }}
                        </th>
                        <td>
                            {{ $city->extras }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection