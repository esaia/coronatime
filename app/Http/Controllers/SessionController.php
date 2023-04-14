<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view('authorization.login');

    }


      public function store()
      {

      }
}
