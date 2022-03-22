@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="products">{{ trans('cruds.productRequest.fields.product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <span class="text-danger">{{ $errors->first('products') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productRequest.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_name">{{ trans('cruds.productRequest.fields.customer_name') }}</label>
                <input class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', '') }}" required>
                @if($errors->has('customer_name'))
                    <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productRequest.fields.customer_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_phone">{{ trans('cruds.productRequest.fields.customer_phone') }}</label>
                <input class="form-control {{ $errors->has('customer_phone') ? 'is-invalid' : '' }}" type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', '') }}" required>
                @if($errors->has('customer_phone'))
                    <span class="text-danger">{{ $errors->first('customer_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productRequest.fields.customer_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_address">{{ trans('cruds.productRequest.fields.customer_address') }}</label>
                <input class="form-control {{ $errors->has('customer_address') ? 'is-invalid' : '' }}" type="text" name="customer_address" id="customer_address" value="{{ old('customer_address', '') }}" required>
                @if($errors->has('customer_address'))
                    <span class="text-danger">{{ $errors->first('customer_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productRequest.fields.customer_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_note">{{ trans('cruds.productRequest.fields.customer_note') }}</label>
                <textarea class="form-control {{ $errors->has('customer_note') ? 'is-invalid' : '' }}" name="customer_note" id="customer_note">{{ old('customer_note') }}</textarea>
                @if($errors->has('customer_note'))
                    <span class="text-danger">{{ $errors->first('customer_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productRequest.fields.customer_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.productRequest.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ProductRequest::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productRequest.fields.status_helper') }}</span>
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