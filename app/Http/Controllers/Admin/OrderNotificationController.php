<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderNotification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderNotificationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrderNotification::with(['order', 'user'])->select(sprintf('%s.*', (new OrderNotification())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'order_notification_show';
                $editGate = 'order_notification_edit';
                $deleteGate = 'order_notification_delete';
                $crudRoutePart = 'order-notifications';

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

            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? OrderNotification::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'order', 'user']);

            return $table->make(true);
        }

        return view('admin.orderNotifications.index');
    }

    public function show(OrderNotification $orderNotification)
    {
        abort_if(Gate::denies('order_notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderNotification->load('order', 'user');

        return view('admin.orderNotifications.show', compact('orderNotification'));
    }
}
