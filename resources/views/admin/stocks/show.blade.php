@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.id') }}
                        </th>
                        <td>
                            {{ $stock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.product') }}
                        </th>
                        <td>
                            {{ $stock->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.purchase') }}
                        </th>
                        <td>
                            {{ $stock->purchase }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.stock') }}
                        </th>
                        <td>
                            {{ $stock->stock }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection