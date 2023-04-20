<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Register\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('authorization.register');

    }


      public function store(RegisterRequest $request): RedirectResponse
      {

          $attributes = $request->validated();
          $attributes['password'] = bcrypt($attributes['password']);

          $user = User::create($attributes);

          auth()->login($user);
          event(new Registered($user));

          return to_route('verification.notice');
      }

}
