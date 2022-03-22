<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentReportRequest;
use App\Http\Requests\StorePaymentReportRequest;
use App\Http\Requests\UpdatePaymentReportRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentReports.create');
    }

    public function store(StorePaymentReportRequest $request)
    {
        $paymentReport = PaymentReport::create($request->all());

        return redirect()->route('admin.payment-reports.index');
    }

    public function edit(PaymentReport $paymentReport)
    {
        abort_if(Gate::denies('payment_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentReports.edit', compact('paymentReport'));
    }

    public function update(UpdatePaymentReportRequest $request, PaymentReport $paymentReport)
    {
        $paymentReport->update($request->all());

        return redirect()->route('admin.payment-reports.index');
    }

    public function show(PaymentReport $paymentReport)
    {
        abort_if(Gate::denies('payment_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentReports.show', compact('paymentReport'));
    }

    public function destroy(PaymentReport $paymentReport)
    {
        abort_if(Gate::denies('payment_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentReportRequest $request)
    {
        PaymentReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
