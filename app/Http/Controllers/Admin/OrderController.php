<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\City;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Zone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Order::with(['courier', 'city', 'zone', 'user', 'customer', 'products'])->select(sprintf('%s.*', (new Order())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'order_show';
                $editGate = 'order_edit';
                $deleteGate = 'order_delete';
                $crudRoutePart = 'orders';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('wpid', function ($row) {
                return $row->wpid ? $row->wpid : '';
            });
            $table->editColumn('invoice', function ($row) {
                return $row->invoice ? $row->invoice : '';
            });
            $table->addColumn('courier_courier_name', function ($row) {
                return $row->courier ? $row->courier->courier_name : '';
            });

            $table->addColumn('city_city_name', function ($row) {
                return $row->city ? $row->city->city_name : '';
            });

            $table->addColumn('zone_zone_name', function ($row) {
                return $row->zone ? $row->zone->zone_name : '';
            });

            $table->editColumn('delivery', function ($row) {
                return $row->delivery ? $row->delivery : '';
            });
            $table->editColumn('discount_type', function ($row) {
                return $row->discount_type ? Order::DISCOUNT_TYPE_SELECT[$row->discount_type] : '';
            });
            $table->editColumn('discount', function ($row) {
                return $row->discount ? $row->discount : '';
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('paid', function ($row) {
                return $row->paid ? $row->paid : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->editColumn('customer.phone', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->phone) : '';
            });
            $table->editColumn('customer.address', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->address) : '';
            });
            $table->editColumn('customer.note', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->note) : '';
            });
            $table->editColumn('products', function ($row) {
                $labels = [];
                foreach ($row->products as $product) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $product->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'courier', 'city', 'zone', 'user', 'customer', 'products']);

            return $table->make(true);
        }

        return view('admin.orders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couriers = Courier::pluck('courier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zones = Zone::pluck('zone_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id');

        return view('admin.orders.create', compact('cities', 'couriers', 'customers', 'products', 'users', 'zones'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->products()->sync($request->input('products', []));

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couriers = Courier::pluck('courier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zones = Zone::pluck('zone_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id');

        $order->load('courier', 'city', 'zone', 'user', 'customer', 'products');

        return view('admin.orders.edit', compact('cities', 'couriers', 'customers', 'order', 'products', 'users', 'zones'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->products()->sync($request->input('products', []));

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('courier', 'city', 'zone', 'user', 'customer', 'products');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
