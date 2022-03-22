@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.zone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zones.update", [$zone->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="courier_name_id">{{ trans('cruds.zone.fields.courier_name') }}</label>
                <select class="form-control select2 {{ $errors->has('courier_name') ? 'is-invalid' : '' }}" name="courier_name_id" id="courier_name_id" required>
                    @foreach($courier_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('courier_name_id') ? old('courier_name_id') : $zone->courier_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('courier_name'))
                    <span class="text-danger">{{ $errors->first('courier_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.courier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_name_id">{{ trans('cruds.zone.fields.city_name') }}</label>
                <select class="form-control select2 {{ $errors->has('city_name') ? 'is-invalid' : '' }}" name="city_name_id" id="city_name_id" required>
                    @foreach($city_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_name_id') ? old('city_name_id') : $zone->city_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city_name'))
                    <span class="text-danger">{{ $errors->first('city_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.city_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zone_name">{{ trans('cruds.zone.fields.zone_name') }}</label>
                <input class="form-control {{ $errors->has('zone_name') ? 'is-invalid' : '' }}" type="text" name="zone_name" id="zone_name" value="{{ old('zone_name', $zone->zone_name) }}" required>
                @if($errors->has('zone_name'))
                    <span class="text-danger">{{ $errors->first('zone_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.zone_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zone.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zone::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $zone->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra">{{ trans('cruds.zone.fields.extra') }}</label>
                <input class="form-control {{ $errors->has('extra') ? 'is-invalid' : '' }}" type="text" name="extra" id="extra" value="{{ old('extra', $zone->extra) }}">
                @if($errors->has('extra'))
                    <span class="text-danger">{{ $errors->first('extra') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zone.fields.extra_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection