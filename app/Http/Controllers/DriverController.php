<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rules() {
        return [
            'nid' => 'required|min:10|max:23',
            'license_number' => 'required|min:6',
            'name' => 'required',
            'address' => 'nullable|min:10',
            'phone' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function list()
    {
        $drivers = Driver::select('*')->get();

        return view('driver.list')->with('drivers', $drivers);
    }

    public function show($id)
    {
        $driver = Driver::select('*')->findOrFail($id);

        return view('driver.show')->with('id', $id)->with('driver', $driver);
    }

    public function add(Request $request)
    {
        return view('driver.add');
    }

    public function edit($id)
    {
        $driver = Driver::select('*')->findOrFail($id);

        return view('driver.edit')->with('id', $id)->with('driver', $driver);
    }

    public function store(Request $request)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Driver::create([
            'nid' => $request->input('nid'),
            'license_number' => $request->input('license_number'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Driver Created');

        return redirect()->route('driver.list');
    }

    public function update(Request $request, $id)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Driver::findOrFail($id);
        $data->update([
            'nid' => $request->input('nid'),
            'license_number' => $request->input('license_number'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Driver Information Updated');

        return redirect()->route('driver.list');
    }

    public function delete($id)
    {
        $data = Driver::findOrFail($id);
        $data->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Driver Information Deleted');

        return redirect()->route('driver.list');
    }
}
