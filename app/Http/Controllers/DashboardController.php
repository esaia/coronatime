<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\Constraint\Count;

class DashboardController extends Controller
{
    public function index()
    {
        return to_route('dashboard.worldwide');
    }



    public function worldwide()
    {

        $newCases = Country::sum('confirmed');
        $recovered = Country::sum('recovered');
        $deaths = Country::sum('deaths');



        return view('dashboard.worldwide', ['newCases' => $newCases,'recovered' => $recovered, 'deaths'=> $deaths]);
    }



    public function country()
    {

        $sortBy = request('sortBy') ?? 'name';
        $sortOrder = request('sortOrder') ?? 'asc';

        $countries = Country::latest()->filter(request(['search']))->get();

        if($sortOrder == 'desc') {
            $countries = $countries->sortByDesc($sortBy);
        } else {
            $countries = $countries->sortBy($sortBy);
        }

        return view('dashboard.country', ['countries' => $countries ]);

    }
}
