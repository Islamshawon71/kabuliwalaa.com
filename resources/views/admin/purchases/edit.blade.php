@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchase.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchases.update", [$purchase->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.purchase.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $purchase->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchase.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="memo">{{ trans('cruds.purchase.fields.memo') }}</label>
                <input class="form-control {{ $errors->has('memo') ? 'is-invalid' : '' }}" type="text" name="memo" id="memo" value="{{ old('memo', $purchase->memo) }}" required>
                @if($errors->has('memo'))
                    <span class="text-danger">{{ $errors->first('memo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchase.fields.memo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.purchase.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $purchase->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchase.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="supplier_id">{{ trans('cruds.purchase.fields.supplier') }}</label>
                <select class="form-control select2 {{ $errors->has('supplier') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id" required>
                    @foreach($suppliers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('supplier_id') ? old('supplier_id') : $purchase->supplier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier'))
                    <span class="text-danger">{{ $errors->first('supplier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchase.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.purchase.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $purchase->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchase.fields.quantity_helper') }}</span>
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