<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;
use Illuminate\Validation\Rule;

class HelperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rules() {
        return [
            'nid' => 'required|min:10|max:23',
            'name' => 'required',
            'address' => 'nullable|min:10',
            'phone' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function list()
    {
        $helpers = Helper::select('*')->get();

        return view('helper.list')->with('helpers', $helpers);
    }

    public function show($id)
    {
        $helper = Helper::select('*')->findOrFail($id);

        return view('helper.show')->with('id', $id)->with('helper', $helper);
    }

    public function add(Request $request)
    {
        return view('helper.add');
    }

    public function edit($id)
    {
        $helper = Helper::select('*')->findOrFail($id);

        return view('helper.edit')->with('id', $id)->with('helper', $helper);
    }

    public function store(Request $request)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Helper::create([
            'nid' => $request->input('nid'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Helper Created');

        return redirect()->route('helper.list');
    }

    public function update(Request $request, $id)
    {
        $validator = IlluminateValidator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Helper::findOrFail($id);
        $data->update([
            'nid' => $request->input('nid'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Helper Information Updated');

        return redirect()->route('helper.list');
    }

    public function delete($id)
    {
        $data = Helper::findOrFail($id);
        $data->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Helper Information Deleted');

        return redirect()->route('helper.list');
    }
}
