@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productVariation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-variations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariation.fields.id') }}
                        </th>
                        <td>
                            {{ $productVariation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariation.fields.product_variation_type') }}
                        </th>
                        <td>
                            {{ App\Models\ProductVariation::PRODUCT_VARIATION_TYPE_SELECT[$productVariation->product_variation_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariation.fields.image') }}
                        </th>
                        <td>
                            @if($productVariation->image)
                                <a href="{{ $productVariation->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $productVariation->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariation.fields.content') }}
                        </th>
                        <td>
                            {{ $productVariation->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariation.fields.product') }}
                        </th>
                        <td>
                            {{ $productVariation->product->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-variations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection