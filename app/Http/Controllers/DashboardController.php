<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function worldwide()
    {
        return view('dashboard.worldwide');
    }

    public function sort(Request $request)
    {
        $sortBy = $request->get('sort_by');
        $sortOrder = $request->get('sort_order');


        if($sortOrder == 'desc') {
            $data = Country::all()->sortByDesc($sortBy);
        } else {
            $data = Country::all()->sortBy($sortBy);
        }



        return view('dashboard.country', ['countries' => $data , 'sortOrder' => $sortOrder, 'sortBy' => $sortBy]);

    }


    public function country()
    {
        $countries = Country::all();
        return view('dashboard.country', ['countries' => $countries , 'sortOrder' => 'asc', 'sortBy' => 'name']);
    }
}
