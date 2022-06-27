<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class UserController extends Controller
{
    /**
     * @var string[]
     */
    private $_rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'address' => 'required|min:10',
        'phone' => 'min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $users = User::select('*')->get();

        return view('user.list')->with('users', $users);
    }

    public function show($id)
    {
        $user = User::select('*')->findOrFail($id);

        return view('user.show')->with('id', $id)->with('user', $user);
    }

    public function add()
    {
        return view('user.add');
    }

    public function edit($id)
    {
        $user = User::select('*')->findOrFail($id);

        return view('user.edit')->with('id', $id)->with('user', $user);
    }

    public function store(Request $request)
    {
        $validator = IlluminateValidator::make($request->all(), $this->_rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => trim($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'User Created');

        return redirect()->route('user.list');
    }

    public function update(Request $request, $id)
    {
        $validator = IlluminateValidator::make($request->all(), $this->_rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = User::findOrFail($id);
        $data->update([
            'name' => $request->input('name'),
            'email' => trim($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'User Information Updated');

        return redirect()->route('user.list');
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'User Information Deleted');

        return redirect()->route('user.list');
    }
}
