<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Route;
use App\Models\Transport;
use App\Models\Driver;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rules()
    {
        $transports = Transport::pluck('id')->toArray();

        return [
            'transport_id' => [
                'required',
                Rule::in($transports)
            ],
            'start_from' => 'required',
            'start_time' => 'required|date_format:H:i:s',
            'departure_from' => 'required',
            'departure_time' => 'required|date_format:H:i:s',
        ];
    }

    public function list()
    {
        $logs = Log::select('*')->get();

        return view('log.list')->with('logs', $logs);
    }

    public function show($id)
    {
        $log = Log::select([
            'logs.*',
            'transports.type as transport_type',
            'transports.name as transport_name',
        ])
            ->leftJoin('transports', function($join) {
                $join->on('transports.id', '=', 'logs.transport_id');
            })
            ->findOrFail($id);

        return view('log.show')
            ->with('id', $id)
            ->with('log', $log);
    }

    public function add(Request $request)
    {
        $transports = Transport::select(['id', 'type', 'name'])->get();

        return view('log.add')
            ->with('transports', $transports);
    }

    public function edit($id)
    {
        $log = Log::select('*')->findOrFail($id);

        $transports = Transport::select(['id', 'name', 'route_id'])->get();

        return view('log.edit')
            ->with('id', $id)
            ->with('log', $log)
            ->with('transports', $transports);
    }

    public function store(Request $request)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $start_from_time = date('H:i:s', strtotime($request->input('start_from')));
        $departure_from_time = date('H:i:s', strtotime($request->input('departure_from')));

        Log::create([
            'transport_id' => $request->input('transport_id'),
            'start_from' => $request->input('start_from'),
            'start_time' => $start_from_time,
            'departure_from' => $request->input('departure_from'),
            'departure_time' => $departure_from_time,
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Log Created');

        return redirect()->route('log.list');
    }

    public function update(Request $request, $id)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $start_from_time = date('H:i:s', strtotime($request->input('start_from')));
        $departure_from_time = date('H:i:s', strtotime($request->input('departure_from')));

        $data = Log::findOrFail($id);
        $data->update([
            'transport_id' => $request->input('transport_id'),
            'start_from' => $request->input('start_from'),
            'start_time' => $start_from_time,
            'departure_from' => $request->input('departure_from'),
            'departure_time' => $departure_from_time,
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Log Information Updated');

        return redirect()->route('log.list');
    }

    public function delete($id)
    {
        $data = Log::findOrFail($id);
        $data->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Log Information Deleted');

        return redirect()->route('log.list');
    }
}
