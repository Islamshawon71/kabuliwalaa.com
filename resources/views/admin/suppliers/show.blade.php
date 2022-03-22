@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.supplier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.supplier.fields.id') }}
                        </th>
                        <td>
                            {{ $supplier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supplier.fields.supplier_name') }}
                        </th>
                        <td>
                            {{ $supplier->supplier_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supplier.fields.supplier_phone') }}
                        </th>
                        <td>
                            {{ $supplier->supplier_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supplier.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Supplier::STATUS_SELECT[$supplier->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.suppliers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#supplier_purchases" role="tab" data-toggle="tab">
                {{ trans('cruds.purchase.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="supplier_purchases">
            @includeIf('admin.suppliers.relationships.supplierPurchases', ['purchases' => $supplier->supplierPurchases])
        </div>
    </div>
</div>

@endsection