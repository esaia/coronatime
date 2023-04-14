<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function worldwide()
    {
        return view('dashboard.worldwide');
    }

    public function country()
    {
        return view('dashboard.country');
    }
}
