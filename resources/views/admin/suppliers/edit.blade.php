@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.supplier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.suppliers.update", [$supplier->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="supplier_name">{{ trans('cruds.supplier.fields.supplier_name') }}</label>
                <input class="form-control {{ $errors->has('supplier_name') ? 'is-invalid' : '' }}" type="text" name="supplier_name" id="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}" required>
                @if($errors->has('supplier_name'))
                    <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.supplier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="supplier_phone">{{ trans('cruds.supplier.fields.supplier_phone') }}</label>
                <input class="form-control {{ $errors->has('supplier_phone') ? 'is-invalid' : '' }}" type="text" name="supplier_phone" id="supplier_phone" value="{{ old('supplier_phone', $supplier->supplier_phone) }}" required>
                @if($errors->has('supplier_phone'))
                    <span class="text-danger">{{ $errors->first('supplier_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.supplier_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.supplier.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Supplier::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $supplier->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.status_helper') }}</span>
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