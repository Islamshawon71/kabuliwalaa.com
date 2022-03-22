<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyZoneRequest;
use App\Http\Requests\StoreZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
use App\Models\City;
use App\Models\Courier;
use App\Models\Zone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ZoneController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('zone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Zone::with(['courier_name', 'city_name'])->select(sprintf('%s.*', (new Zone())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'zone_show';
                $editGate = 'zone_edit';
                $deleteGate = 'zone_delete';
                $crudRoutePart = 'zones';

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
            $table->addColumn('courier_name_courier_name', function ($row) {
                return $row->courier_name ? $row->courier_name->courier_name : '';
            });

            $table->addColumn('city_name_city_name', function ($row) {
                return $row->city_name ? $row->city_name->city_name : '';
            });

            $table->editColumn('zone_name', function ($row) {
                return $row->zone_name ? $row->zone_name : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Zone::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'courier_name', 'city_name']);

            return $table->make(true);
        }

        return view('admin.zones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('zone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courier_names = Courier::pluck('courier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $city_names = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.zones.create', compact('city_names', 'courier_names'));
    }

    public function store(StoreZoneRequest $request)
    {
        $zone = Zone::create($request->all());

        return redirect()->route('admin.zones.index');
    }

    public function edit(Zone $zone)
    {
        abort_if(Gate::denies('zone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courier_names = Courier::pluck('courier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $city_names = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zone->load('courier_name', 'city_name');

        return view('admin.zones.edit', compact('city_names', 'courier_names', 'zone'));
    }

    public function update(UpdateZoneRequest $request, Zone $zone)
    {
        $zone->update($request->all());

        return redirect()->route('admin.zones.index');
    }

    public function show(Zone $zone)
    {
        abort_if(Gate::denies('zone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zone->load('courier_name', 'city_name');

        return view('admin.zones.show', compact('zone'));
    }

    public function destroy(Zone $zone)
    {
        abort_if(Gate::denies('zone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zone->delete();

        return back();
    }

    public function massDestroy(MassDestroyZoneRequest $request)
    {
        Zone::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
