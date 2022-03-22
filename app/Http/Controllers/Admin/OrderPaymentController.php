<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderPaymentRequest;
use App\Http\Requests\StoreOrderPaymentRequest;
use App\Http\Requests\UpdateOrderPaymentRequest;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Payment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderPaymentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrderPayment::with(['order', 'payment'])->select(sprintf('%s.*', (new OrderPayment())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'order_payment_show';
                $editGate = 'order_payment_edit';
                $deleteGate = 'order_payment_delete';
                $crudRoutePart = 'order-payments';

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
            $table->addColumn('order_invoice', function ($row) {
                return $row->order ? $row->order->invoice : '';
            });

            $table->addColumn('payment_payment_type', function ($row) {
                return $row->payment ? $row->payment->payment_type : '';
            });

            $table->editColumn('payment.number', function ($row) {
                return $row->payment ? (is_string($row->payment) ? $row->payment : $row->payment->number) : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('transaction_number', function ($row) {
                return $row->transaction_number ? $row->transaction_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'order', 'payment']);

            return $table->make(true);
        }

        return view('admin.orderPayments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('invoice', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payments = Payment::pluck('payment_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orderPayments.create', compact('orders', 'payments'));
    }

    public function store(StoreOrderPaymentRequest $request)
    {
        $orderPayment = OrderPayment::create($request->all());

        return redirect()->route('admin.order-payments.index');
    }

    public function edit(OrderPayment $orderPayment)
    {
        abort_if(Gate::denies('order_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('invoice', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payments = Payment::pluck('payment_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderPayment->load('order', 'payment');

        return view('admin.orderPayments.edit', compact('orderPayment', 'orders', 'payments'));
    }

    public function update(UpdateOrderPaymentRequest $request, OrderPayment $orderPayment)
    {
        $orderPayment->update($request->all());

        return redirect()->route('admin.order-payments.index');
    }

    public function show(OrderPayment $orderPayment)
    {
        abort_if(Gate::denies('order_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderPayment->load('order', 'payment');

        return view('admin.orderPayments.show', compact('orderPayment'));
    }

    public function destroy(OrderPayment $orderPayment)
    {
        abort_if(Gate::denies('order_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderPayment->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderPaymentRequest $request)
    {
        OrderPayment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
