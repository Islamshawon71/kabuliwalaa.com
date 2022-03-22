@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stock.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stocks.update", [$stock->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.stock.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $stock->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="purchase">{{ trans('cruds.stock.fields.purchase') }}</label>
                <input class="form-control {{ $errors->has('purchase') ? 'is-invalid' : '' }}" type="text" name="purchase" id="purchase" value="{{ old('purchase', $stock->purchase) }}" required>
                @if($errors->has('purchase'))
                    <span class="text-danger">{{ $errors->first('purchase') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.purchase_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stock">{{ trans('cruds.stock.fields.stock') }}</label>
                <input class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" type="text" name="stock" id="stock" value="{{ old('stock', $stock->stock) }}" required>
                @if($errors->has('stock'))
                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.stock_helper') }}</span>
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