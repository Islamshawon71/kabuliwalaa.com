@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reviewReply.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.review-replies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="review_id">{{ trans('cruds.reviewReply.fields.review') }}</label>
                <select class="form-control select2 {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review_id" id="review_id" required>
                    @foreach($reviews as $id => $entry)
                        <option value="{{ $id }}" {{ old('review_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('review'))
                    <span class="text-danger">{{ $errors->first('review') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reviewReply.fields.review_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reply">{{ trans('cruds.reviewReply.fields.reply') }}</label>
                <input class="form-control {{ $errors->has('reply') ? 'is-invalid' : '' }}" type="text" name="reply" id="reply" value="{{ old('reply', '') }}" required>
                @if($errors->has('reply'))
                    <span class="text-danger">{{ $errors->first('reply') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reviewReply.fields.reply_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.reviewReply.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ReviewReply::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reviewReply.fields.status_helper') }}</span>
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