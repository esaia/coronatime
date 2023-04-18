<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        $locale = $request->input('locale');
        if (in_array($locale, ['en', 'ka'])) {
            session()->put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
}
