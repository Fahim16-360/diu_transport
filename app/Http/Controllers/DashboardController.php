<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $data['counts'] = [
            'transports' => DB::table('transports')->count('id'),
            'drivers' => DB::table('drivers')->count('id'),
            'helpers' => DB::table('helpers')->count('id'),
            'users' => DB::table('users')->count('id'),
        ];

        return view('dashboard', $data);
    }
}
