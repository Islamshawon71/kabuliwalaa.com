@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.id') }}
                        </th>
                        <td>
                            {{ $purchase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.date') }}
                        </th>
                        <td>
                            {{ $purchase->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.memo') }}
                        </th>
                        <td>
                            {{ $purchase->memo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.product') }}
                        </th>
                        <td>
                            {{ $purchase->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.supplier') }}
                        </th>
                        <td>
                            {{ $purchase->supplier->supplier_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchase.fields.quantity') }}
                        </th>
                        <td>
                            {{ $purchase->quantity }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection