@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $productRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.product') }}
                        </th>
                        <td>
                            @foreach($productRequest->products as $key => $product)
                                <span class="label label-info">{{ $product->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.customer_name') }}
                        </th>
                        <td>
                            {{ $productRequest->customer_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.customer_phone') }}
                        </th>
                        <td>
                            {{ $productRequest->customer_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.customer_address') }}
                        </th>
                        <td>
                            {{ $productRequest->customer_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.customer_note') }}
                        </th>
                        <td>
                            {{ $productRequest->customer_note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productRequest.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ProductRequest::STATUS_SELECT[$productRequest->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection