<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequestRequest;
use App\Http\Requests\StoreProductRequestRequest;
use App\Http\Requests\UpdateProductRequestRequest;
use App\Models\Product;
use App\Models\ProductRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductRequestController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductRequest::with(['products'])->select(sprintf('%s.*', (new ProductRequest())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_request_show';
                $editGate = 'product_request_edit';
                $deleteGate = 'product_request_delete';
                $crudRoutePart = 'product-requests';

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
            $table->editColumn('product', function ($row) {
                $labels = [];
                foreach ($row->products as $product) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $product->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('customer_name', function ($row) {
                return $row->customer_name ? $row->customer_name : '';
            });
            $table->editColumn('customer_phone', function ($row) {
                return $row->customer_phone ? $row->customer_phone : '';
            });
            $table->editColumn('customer_address', function ($row) {
                return $row->customer_address ? $row->customer_address : '';
            });
            $table->editColumn('customer_note', function ($row) {
                return $row->customer_note ? $row->customer_note : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ProductRequest::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.productRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        return view('admin.productRequests.create', compact('products'));
    }

    public function store(StoreProductRequestRequest $request)
    {
        $productRequest = ProductRequest::create($request->all());
        $productRequest->products()->sync($request->input('products', []));

        return redirect()->route('admin.product-requests.index');
    }

    public function edit(ProductRequest $productRequest)
    {
        abort_if(Gate::denies('product_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        $productRequest->load('products');

        return view('admin.productRequests.edit', compact('productRequest', 'products'));
    }

    public function update(UpdateProductRequestRequest $request, ProductRequest $productRequest)
    {
        $productRequest->update($request->all());
        $productRequest->products()->sync($request->input('products', []));

        return redirect()->route('admin.product-requests.index');
    }

    public function show(ProductRequest $productRequest)
    {
        abort_if(Gate::denies('product_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productRequest->load('products');

        return view('admin.productRequests.show', compact('productRequest'));
    }

    public function destroy(ProductRequest $productRequest)
    {
        abort_if(Gate::denies('product_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequestRequest $request)
    {
        ProductRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
