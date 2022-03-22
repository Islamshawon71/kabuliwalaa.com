<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductReviewRequest;
use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\Customer;
use App\Models\ProductReview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductReviewController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductReview::with(['customer'])->select(sprintf('%s.*', (new ProductReview())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_review_show';
                $editGate = 'product_review_edit';
                $deleteGate = 'product_review_delete';
                $crudRoutePart = 'product-reviews';

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
            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->editColumn('stars', function ($row) {
                return $row->stars ? $row->stars : '';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ProductReview::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer']);

            return $table->make(true);
        }

        return view('admin.productReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productReviews.create', compact('customers'));
    }

    public function store(StoreProductReviewRequest $request)
    {
        $productReview = ProductReview::create($request->all());

        return redirect()->route('admin.product-reviews.index');
    }

    public function edit(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productReview->load('customer');

        return view('admin.productReviews.edit', compact('customers', 'productReview'));
    }

    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        $productReview->update($request->all());

        return redirect()->route('admin.product-reviews.index');
    }

    public function show(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->load('customer');

        return view('admin.productReviews.show', compact('productReview'));
    }

    public function destroy(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductReviewRequest $request)
    {
        ProductReview::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
