<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rules()
    {
        return [
            'route_number' => 'required',
            'name' => 'required|string',
            'description' => 'nullable',
            'map_url' => 'nullable|url',
        ];
    }

    public function list()
    {
        $routes = Route::select('*')->get();

        return view('route.list')->with('routes', $routes);
    }

    public function show($id)
    {
        $route = Route::select('*')->findOrFail($id);

        return view('route.show')
            ->with('id', $id)
            ->with('route', $route);
    }

    public function add(Request $request)
    {
        return view('route.add');
    }

    public function edit($id)
    {
        $route = Route::select('*')->findOrFail($id);

        return view('route.edit')
            ->with('id', $id)
            ->with('route', $route);
    }

    public function store(Request $request)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Route::create([
            'route_number' => $request->input('route_number'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'map_url' => $request->input('map_url'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Route Created');

        return redirect()->route('route.list');
    }

    public function update(Request $request, $id)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Route::findOrFail($id);
        $data->update([
            'route_number' => $request->input('route_number'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'map_url' => $request->input('map_url'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Route Information Updated');

        return redirect()->route('route.list');
    }

    public function delete($id)
    {
        $data = Route::findOrFail($id);
        $data->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Route Information Deleted');

        return redirect()->route('route.list');
    }
}
