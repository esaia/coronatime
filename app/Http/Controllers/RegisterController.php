<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
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
