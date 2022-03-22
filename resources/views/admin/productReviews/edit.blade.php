@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productReview.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-reviews.update", [$productReview->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.productReview.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $productReview->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stars">{{ trans('cruds.productReview.fields.stars') }}</label>
                <input class="form-control {{ $errors->has('stars') ? 'is-invalid' : '' }}" type="number" name="stars" id="stars" value="{{ old('stars', $productReview->stars) }}" step="1" required>
                @if($errors->has('stars'))
                    <span class="text-danger">{{ $errors->first('stars') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.stars_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.productReview.fields.comments') }}</label>
                <input class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" type="text" name="comments" id="comments" value="{{ old('comments', $productReview->comments) }}">
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.productReview.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ProductReview::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $productReview->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productReview.fields.status_helper') }}</span>
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