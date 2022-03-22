@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="wpid">{{ trans('cruds.order.fields.wpid') }}</label>
                <input class="form-control {{ $errors->has('wpid') ? 'is-invalid' : '' }}" type="text" name="wpid" id="wpid" value="{{ old('wpid', $order->wpid) }}">
                @if($errors->has('wpid'))
                    <span class="text-danger">{{ $errors->first('wpid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.wpid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice">{{ trans('cruds.order.fields.invoice') }}</label>
                <input class="form-control {{ $errors->has('invoice') ? 'is-invalid' : '' }}" type="text" name="invoice" id="invoice" value="{{ old('invoice', $order->invoice) }}" required>
                @if($errors->has('invoice'))
                    <span class="text-danger">{{ $errors->first('invoice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="memo">{{ trans('cruds.order.fields.memo') }}</label>
                <input class="form-control {{ $errors->has('memo') ? 'is-invalid' : '' }}" type="text" name="memo" id="memo" value="{{ old('memo', $order->memo) }}">
                @if($errors->has('memo'))
                    <span class="text-danger">{{ $errors->first('memo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.memo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="courier_id">{{ trans('cruds.order.fields.courier') }}</label>
                <select class="form-control select2 {{ $errors->has('courier') ? 'is-invalid' : '' }}" name="courier_id" id="courier_id" required>
                    @foreach($couriers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('courier_id') ? old('courier_id') : $order->courier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('courier'))
                    <span class="text-danger">{{ $errors->first('courier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.courier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city_id">{{ trans('cruds.order.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id">
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $order->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zone_id">{{ trans('cruds.order.fields.zone') }}</label>
                <select class="form-control select2 {{ $errors->has('zone') ? 'is-invalid' : '' }}" name="zone_id" id="zone_id">
                    @foreach($zones as $id => $entry)
                        <option value="{{ $id }}" {{ (old('zone_id') ? old('zone_id') : $order->zone->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('zone'))
                    <span class="text-danger">{{ $errors->first('zone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.zone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery">{{ trans('cruds.order.fields.delivery') }}</label>
                <input class="form-control {{ $errors->has('delivery') ? 'is-invalid' : '' }}" type="number" name="delivery" id="delivery" value="{{ old('delivery', $order->delivery) }}" step="1" required>
                @if($errors->has('delivery'))
                    <span class="text-danger">{{ $errors->first('delivery') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delivery_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.discount_type') }}</label>
                <select class="form-control {{ $errors->has('discount_type') ? 'is-invalid' : '' }}" name="discount_type" id="discount_type">
                    <option value disabled {{ old('discount_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::DISCOUNT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('discount_type', $order->discount_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('discount_type'))
                    <span class="text-danger">{{ $errors->first('discount_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.discount_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.order.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $order->discount) }}" step="1">
                @if($errors->has('discount'))
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.order.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $order->total) }}" step="1" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid">{{ trans('cruds.order.fields.paid') }}</label>
                <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" type="number" name="paid" id="paid" value="{{ old('paid', $order->paid) }}" step="1">
                @if($errors->has('paid'))
                    <span class="text-danger">{{ $errors->first('paid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="confirm_date">{{ trans('cruds.order.fields.confirm_date') }}</label>
                <input class="form-control date {{ $errors->has('confirm_date') ? 'is-invalid' : '' }}" type="text" name="confirm_date" id="confirm_date" value="{{ old('confirm_date', $order->confirm_date) }}">
                @if($errors->has('confirm_date'))
                    <span class="text-danger">{{ $errors->first('confirm_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.confirm_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_date">{{ trans('cruds.order.fields.delivery_date') }}</label>
                <input class="form-control date {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date', $order->delivery_date) }}">
                @if($errors->has('delivery_date'))
                    <span class="text-danger">{{ $errors->first('delivery_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.delivery_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complete_date">{{ trans('cruds.order.fields.complete_date') }}</label>
                <input class="form-control date {{ $errors->has('complete_date') ? 'is-invalid' : '' }}" type="text" name="complete_date" id="complete_date" value="{{ old('complete_date', $order->complete_date) }}">
                @if($errors->has('complete_date'))
                    <span class="text-danger">{{ $errors->first('complete_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.complete_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.order.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $order->status) }}" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.order.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', $order->note) }}">
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $order->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.order.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $order->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="products">{{ trans('cruds.order.fields.products') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $order->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <span class="text-danger">{{ $errors->first('products') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.products_helper') }}</span>
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