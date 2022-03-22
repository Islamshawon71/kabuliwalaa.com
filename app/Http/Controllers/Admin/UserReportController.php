<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserReportRequest;
use App\Http\Requests\StoreUserReportRequest;
use App\Http\Requests\UpdateUserReportRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userReports.create');
    }

    public function store(StoreUserReportRequest $request)
    {
        $userReport = UserReport::create($request->all());

        return redirect()->route('admin.user-reports.index');
    }

    public function edit(UserReport $userReport)
    {
        abort_if(Gate::denies('user_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userReports.edit', compact('userReport'));
    }

    public function update(UpdateUserReportRequest $request, UserReport $userReport)
    {
        $userReport->update($request->all());

        return redirect()->route('admin.user-reports.index');
    }

    public function show(UserReport $userReport)
    {
        abort_if(Gate::denies('user_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userReports.show', compact('userReport'));
    }

    public function destroy(UserReport $userReport)
    {
        abort_if(Gate::denies('user_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserReportRequest $request)
    {
        UserReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
