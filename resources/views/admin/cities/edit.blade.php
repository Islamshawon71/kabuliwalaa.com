@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cities.update", [$city->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="courier_name_id">{{ trans('cruds.city.fields.courier_name') }}</label>
                <select class="form-control select2 {{ $errors->has('courier_name') ? 'is-invalid' : '' }}" name="courier_name_id" id="courier_name_id" required>
                    @foreach($courier_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('courier_name_id') ? old('courier_name_id') : $city->courier_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('courier_name'))
                    <span class="text-danger">{{ $errors->first('courier_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.courier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_name">{{ trans('cruds.city.fields.city_name') }}</label>
                <input class="form-control {{ $errors->has('city_name') ? 'is-invalid' : '' }}" type="text" name="city_name" id="city_name" value="{{ old('city_name', $city->city_name) }}" required>
                @if($errors->has('city_name'))
                    <span class="text-danger">{{ $errors->first('city_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.city_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.city.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\City::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $city->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extras">{{ trans('cruds.city.fields.extras') }}</label>
                <input class="form-control {{ $errors->has('extras') ? 'is-invalid' : '' }}" type="text" name="extras" id="extras" value="{{ old('extras', $city->extras) }}">
                @if($errors->has('extras'))
                    <span class="text-danger">{{ $errors->first('extras') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.extras_helper') }}</span>
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