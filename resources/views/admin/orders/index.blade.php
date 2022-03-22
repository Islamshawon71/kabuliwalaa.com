@extends('layouts.admin')
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.order.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.wpid') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.invoice') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.courier') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.zone') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.delivery') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.discount_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.discount') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.total') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.paid') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.confirm_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.delivery_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.complete_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.note') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.customer.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.customer.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.customer.fields.note') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.products') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'wpid', name: 'wpid' },
{ data: 'invoice', name: 'invoice' },
{ data: 'courier_courier_name', name: 'courier.courier_name' },
{ data: 'city_city_name', name: 'city.city_name' },
{ data: 'zone_zone_name', name: 'zone.zone_name' },
{ data: 'delivery', name: 'delivery' },
{ data: 'discount_type', name: 'discount_type' },
{ data: 'discount', name: 'discount' },
{ data: 'total', name: 'total' },
{ data: 'paid', name: 'paid' },
{ data: 'confirm_date', name: 'confirm_date' },
{ data: 'delivery_date', name: 'delivery_date' },
{ data: 'complete_date', name: 'complete_date' },
{ data: 'status', name: 'status' },
{ data: 'note', name: 'note' },
{ data: 'user_name', name: 'user.name' },
{ data: 'customer_name', name: 'customer.name' },
{ data: 'customer.phone', name: 'customer.phone' },
{ data: 'customer.address', name: 'customer.address' },
{ data: 'customer.note', name: 'customer.note' },
{ data: 'products', name: 'products.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection