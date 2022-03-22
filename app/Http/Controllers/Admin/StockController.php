<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Product;
use App\Models\Stock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Stock::with(['product'])->select(sprintf('%s.*', (new Stock())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'stock_show';
                $editGate = 'stock_edit';
                $deleteGate = 'stock_delete';
                $crudRoutePart = 'stocks';

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
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('purchase', function ($row) {
                return $row->purchase ? $row->purchase : '';
            });
            $table->editColumn('stock', function ($row) {
                return $row->stock ? $row->stock : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.stocks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stocks.create', compact('products'));
    }

    public function store(StoreStockRequest $request)
    {
        $stock = Stock::create($request->all());

        return redirect()->route('admin.stocks.index');
    }

    public function edit(Stock $stock)
    {
        abort_if(Gate::denies('stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stock->load('product');

        return view('admin.stocks.edit', compact('products', 'stock'));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->all());

        return redirect()->route('admin.stocks.index');
    }

    public function show(Stock $stock)
    {
        abort_if(Gate::denies('stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->load('product');

        return view('admin.stocks.show', compact('stock'));
    }

    public function destroy(Stock $stock)
    {
        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
