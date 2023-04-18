<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Register\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authorization.register');

    }


      public function store(RegisterRequest $request)
      {

          $attributes = $request->validated();
          $attributes['password'] = bcrypt($attributes['password']);

          $user = User::create($attributes);

          auth()->login($user);
          event(new Registered($user));

          return to_route('verification.notice');
      }

}
