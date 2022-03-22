<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductReportRequest;
use App\Http\Requests\StoreProductReportRequest;
use App\Http\Requests\UpdateProductReportRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productReports.create');
    }

    public function store(StoreProductReportRequest $request)
    {
        $productReport = ProductReport::create($request->all());

        return redirect()->route('admin.product-reports.index');
    }

    public function edit(ProductReport $productReport)
    {
        abort_if(Gate::denies('product_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productReports.edit', compact('productReport'));
    }

    public function update(UpdateProductReportRequest $request, ProductReport $productReport)
    {
        $productReport->update($request->all());

        return redirect()->route('admin.product-reports.index');
    }

    public function show(ProductReport $productReport)
    {
        abort_if(Gate::denies('product_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productReports.show', compact('productReport'));
    }

    public function destroy(ProductReport $productReport)
    {
        abort_if(Gate::denies('product_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductReportRequest $request)
    {
        ProductReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
