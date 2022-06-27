<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Transport;
use App\Models\Driver;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class TransportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rules()
    {
        $routes = Route::pluck('id')->toArray();
        $drivers = Driver::where('status', '=', 'Active')->pluck('id')->toArray();
        $helpers = Helper::where('status', '=', 'Active')->pluck('id')->toArray();

        return [
            'type' => 'required|in:Bus,Mini-Bus,Car',
            'name' => 'required',
            'license_number' => 'required|min:6',
            'route_id' => [
                'required',
                Rule::in($routes)
            ],
            'driver_id' => [
                'required',
                Rule::in($drivers)
            ],
            'helper_id' => [
                'required',
                Rule::in($helpers)
            ],
        ];
    }

    public function list()
    {
        $transports = Transport::select([
            'transports.*',
            'routes.route_number',
        ])
            ->leftJoin('routes', function($join) {
                $join->on('routes.id', '=', 'transports.route_id');
            })
            ->get();

        return view('transport.list')->with('transports', $transports);
    }

    public function show($id)
    {
        $transport = Transport::select([
            'transports.*',
            'routes.route_number',
            'drivers.name as driver_name',
            'drivers.status as driver_status',
            'helpers.name as helper_name',
            'helpers.status as helper_status',
        ])
            ->leftJoin('routes', function($join) {
                $join->on('routes.id', '=', 'transports.route_id');
            })
            ->leftJoin('drivers', function($join) {
                $join->on('drivers.id', '=', 'transports.driver_id');
            })
            ->leftJoin('helpers', function($join) {
                $join->on('helpers.id', '=', 'transports.helper_id');
            })
            ->findOrFail($id);

        return view('transport.show')
            ->with('id', $id)
            ->with('transport', $transport);
    }

    public function add(Request $request)
    {
        $routes = Route::select(['id', 'route_number'])->get();
        $drivers = Driver::select(['id', 'name'])->where('status', '=', 'Active')->get();
        $helpers = Helper::select('id', 'name')->where('status', '=', 'Active')->get();

        return view('transport.add')
            ->with('routes', $routes)
            ->with('drivers', $drivers)
            ->with('helpers', $helpers);
    }

    public function edit($id)
    {
        $transport = Transport::select('*')->findOrFail($id);

        $routes = Route::select(['id', 'route_number'])->get();
        $drivers = Driver::select(['id', 'name'])->where('status', '=', 'Active')->get();
        $helpers = Helper::select('id', 'name')->where('status', '=', 'Active')->get();

        return view('transport.edit')
            ->with('id', $id)
            ->with('transport', $transport)
            ->with('routes', $routes)
            ->with('drivers', $drivers)
            ->with('helpers', $helpers);
    }

    public function store(Request $request)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Transport::create([
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'license_number' => $request->input('license_number'),
            'route_id' => $request->input('route_id'),
            'driver_id' => $request->input('driver_id'),
            'helper_id' => $request->input('helper_id'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Transport Created');

        return redirect()->route('transport.list');
    }

    public function update(Request $request, $id)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Transport::findOrFail($id);
        $data->update([
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'license_number' => $request->input('license_number'),
            'route_id' => $request->input('route_id'),
            'driver_id' => $request->input('driver_id'),
            'helper_id' => $request->input('helper_id'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Transport Information Updated');

        return redirect()->route('transport.list');
    }

    public function delete($id)
    {
        $data = Transport::findOrFail($id);
        $data->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Transport Information Deleted');

        return redirect()->route('transport.list');
    }
}
