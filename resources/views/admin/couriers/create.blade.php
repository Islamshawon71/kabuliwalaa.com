@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.courier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.couriers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="courier_name">{{ trans('cruds.courier.fields.courier_name') }}</label>
                <input class="form-control {{ $errors->has('courier_name') ? 'is-invalid' : '' }}" type="text" name="courier_name" id="courier_name" value="{{ old('courier_name', '') }}" required>
                @if($errors->has('courier_name'))
                    <span class="text-danger">{{ $errors->first('courier_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.courier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('city_available') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="city_available" value="0">
                    <input class="form-check-input" type="checkbox" name="city_available" id="city_available" value="1" {{ old('city_available', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="city_available">{{ trans('cruds.courier.fields.city_available') }}</label>
                </div>
                @if($errors->has('city_available'))
                    <span class="text-danger">{{ $errors->first('city_available') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.city_available_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('zone_available') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="zone_available" value="0">
                    <input class="form-check-input" type="checkbox" name="zone_available" id="zone_available" value="1" {{ old('zone_available', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="zone_available">{{ trans('cruds.courier.fields.zone_available') }}</label>
                </div>
                @if($errors->has('zone_available'))
                    <span class="text-danger">{{ $errors->first('zone_available') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.zone_available_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_charge">{{ trans('cruds.courier.fields.delivery_charge') }}</label>
                <input class="form-control {{ $errors->has('delivery_charge') ? 'is-invalid' : '' }}" type="text" name="delivery_charge" id="delivery_charge" value="{{ old('delivery_charge', '') }}">
                @if($errors->has('delivery_charge'))
                    <span class="text-danger">{{ $errors->first('delivery_charge') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.delivery_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.courier.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Courier::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courier.fields.status_helper') }}</span>
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