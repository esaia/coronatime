<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('authorization.login');

    }


      public function store(LoginRequest $request)
      {


          $attributes = $request->validated();

          if(isset($attributes['remember']) && $attributes['remember']) {
              $remember=true;
              unset($attributes['remember']);
          } else {
              $remember = false;
          }

          if (!auth()->attempt($attributes, $remember)) {
              throw ValidationException::withMessages(['email' =>  __('login.email_error')  ]);
          }

          session()->regenerate();
          return to_route('dashboard.worldwide');

      }

      public function destroy()
      {
          auth()->logout();
          return to_route('login');
      }

}
