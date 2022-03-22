<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySmsNotificationRequest;
use App\Http\Requests\StoreSmsNotificationRequest;
use App\Http\Requests\UpdateSmsNotificationRequest;
use App\Models\SmsNotification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SmsNotificationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sms_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SmsNotification::query()->select(sprintf('%s.*', (new SmsNotification())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sms_notification_show';
                $editGate = 'sms_notification_edit';
                $deleteGate = 'sms_notification_delete';
                $crudRoutePart = 'sms-notifications';

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
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? SmsNotification::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.smsNotifications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sms_notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.smsNotifications.create');
    }

    public function store(StoreSmsNotificationRequest $request)
    {
        $smsNotification = SmsNotification::create($request->all());

        return redirect()->route('admin.sms-notifications.index');
    }

    public function edit(SmsNotification $smsNotification)
    {
        abort_if(Gate::denies('sms_notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.smsNotifications.edit', compact('smsNotification'));
    }

    public function update(UpdateSmsNotificationRequest $request, SmsNotification $smsNotification)
    {
        $smsNotification->update($request->all());

        return redirect()->route('admin.sms-notifications.index');
    }

    public function show(SmsNotification $smsNotification)
    {
        abort_if(Gate::denies('sms_notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.smsNotifications.show', compact('smsNotification'));
    }

    public function destroy(SmsNotification $smsNotification)
    {
        abort_if(Gate::denies('sms_notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smsNotification->delete();

        return back();
    }

    public function massDestroy(MassDestroySmsNotificationRequest $request)
    {
        SmsNotification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
