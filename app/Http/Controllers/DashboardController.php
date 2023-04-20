<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        return to_route('dashboard.worldwide');
    }



    public function worldwide(): View
    {

        $newCases = Country::sum('confirmed');
        $recovered = Country::sum('recovered');
        $deaths = Country::sum('deaths');



        return view('dashboard.worldwide', ['newCases' => $newCases,'recovered' => $recovered, 'deaths'=> $deaths]);
    }



    public function country(): View
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
