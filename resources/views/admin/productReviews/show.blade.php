@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productReview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productReview.fields.id') }}
                        </th>
                        <td>
                            {{ $productReview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productReview.fields.customer') }}
                        </th>
                        <td>
                            {{ $productReview->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productReview.fields.stars') }}
                        </th>
                        <td>
                            {{ $productReview->stars }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productReview.fields.comments') }}
                        </th>
                        <td>
                            {{ $productReview->comments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productReview.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ProductReview::STATUS_SELECT[$productReview->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection