<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourierReportRequest;
use App\Http\Requests\StoreCourierReportRequest;
use App\Http\Requests\UpdateCourierReportRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourierReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('courier_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courierReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('courier_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courierReports.create');
    }

    public function store(StoreCourierReportRequest $request)
    {
        $courierReport = CourierReport::create($request->all());

        return redirect()->route('admin.courier-reports.index');
    }

    public function edit(CourierReport $courierReport)
    {
        abort_if(Gate::denies('courier_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courierReports.edit', compact('courierReport'));
    }

    public function update(UpdateCourierReportRequest $request, CourierReport $courierReport)
    {
        $courierReport->update($request->all());

        return redirect()->route('admin.courier-reports.index');
    }

    public function show(CourierReport $courierReport)
    {
        abort_if(Gate::denies('courier_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courierReports.show', compact('courierReport'));
    }

    public function destroy(CourierReport $courierReport)
    {
        abort_if(Gate::denies('courier_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courierReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourierReportRequest $request)
    {
        CourierReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
