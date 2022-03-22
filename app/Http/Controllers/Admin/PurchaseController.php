<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseRequest;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Purchase::with(['product', 'supplier'])->select(sprintf('%s.*', (new Purchase())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_show';
                $editGate = 'purchase_edit';
                $deleteGate = 'purchase_delete';
                $crudRoutePart = 'purchases';

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

            $table->editColumn('memo', function ($row) {
                return $row->memo ? $row->memo : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('product.purchase_price', function ($row) {
                return $row->product ? (is_string($row->product) ? $row->product : $row->product->purchase_price) : '';
            });
            $table->addColumn('supplier_supplier_name', function ($row) {
                return $row->supplier ? $row->supplier->supplier_name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product', 'supplier']);

            return $table->make(true);
        }

        return view('admin.purchases.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $suppliers = Supplier::pluck('supplier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchases.create', compact('products', 'suppliers'));
    }

    public function store(StorePurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all());

        return redirect()->route('admin.purchases.index');
    }

    public function edit(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $suppliers = Supplier::pluck('supplier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchase->load('product', 'supplier');

        return view('admin.purchases.edit', compact('products', 'purchase', 'suppliers'));
    }

    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        $purchase->update($request->all());

        return redirect()->route('admin.purchases.index');
    }

    public function show(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->load('product', 'supplier');

        return view('admin.purchases.show', compact('purchase'));
    }

    public function destroy(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseRequest $request)
    {
        Purchase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
