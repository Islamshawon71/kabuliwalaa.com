<div class="m-3">
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
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-customerOrders">
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
                    <tbody>
                        @foreach($orders as $key => $order)
                            <tr data-entry-id="{{ $order->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $order->id ?? '' }}
                                </td>
                                <td>
                                    {{ $order->wpid ?? '' }}
                                </td>
                                <td>
                                    {{ $order->invoice ?? '' }}
                                </td>
                                <td>
                                    {{ $order->courier->courier_name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->city->city_name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->zone->zone_name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->delivery ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Order::DISCOUNT_TYPE_SELECT[$order->discount_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $order->discount ?? '' }}
                                </td>
                                <td>
                                    {{ $order->total ?? '' }}
                                </td>
                                <td>
                                    {{ $order->paid ?? '' }}
                                </td>
                                <td>
                                    {{ $order->confirm_date ?? '' }}
                                </td>
                                <td>
                                    {{ $order->delivery_date ?? '' }}
                                </td>
                                <td>
                                    {{ $order->complete_date ?? '' }}
                                </td>
                                <td>
                                    {{ $order->status ?? '' }}
                                </td>
                                <td>
                                    {{ $order->note ?? '' }}
                                </td>
                                <td>
                                    {{ $order->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->customer->name ?? '' }}
                                </td>
                                <td>
                                    {{ $order->customer->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $order->customer->address ?? '' }}
                                </td>
                                <td>
                                    {{ $order->customer->note ?? '' }}
                                </td>
                                <td>
                                    @foreach($order->products as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('order_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('order_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit', $order->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('order_delete')
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-customerOrders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection