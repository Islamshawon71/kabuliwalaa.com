<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTotalInventoryRequest;
use App\Http\Requests\StoreTotalInventoryRequest;
use App\Http\Requests\UpdateTotalInventoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TotalInventoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('total_inventory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.totalInventories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('total_inventory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.totalInventories.create');
    }

    public function store(StoreTotalInventoryRequest $request)
    {
        $totalInventory = TotalInventory::create($request->all());

        return redirect()->route('admin.total-inventories.index');
    }

    public function edit(TotalInventory $totalInventory)
    {
        abort_if(Gate::denies('total_inventory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.totalInventories.edit', compact('totalInventory'));
    }

    public function update(UpdateTotalInventoryRequest $request, TotalInventory $totalInventory)
    {
        $totalInventory->update($request->all());

        return redirect()->route('admin.total-inventories.index');
    }

    public function show(TotalInventory $totalInventory)
    {
        abort_if(Gate::denies('total_inventory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.totalInventories.show', compact('totalInventory'));
    }

    public function destroy(TotalInventory $totalInventory)
    {
        abort_if(Gate::denies('total_inventory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $totalInventory->delete();

        return back();
    }

    public function massDestroy(MassDestroyTotalInventoryRequest $request)
    {
        TotalInventory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
