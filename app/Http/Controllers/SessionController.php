<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store(LoginRequest $request): RedirectResponse
    {

        $attributes = $request->validated();

        if(isset($attributes['remember']) && $attributes['remember']) {
            $remember=true;
            unset($attributes['remember']);
        } else {
            $remember = false;
        }

        $loginField = filter_var($attributes['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $attributes[$loginField] = $attributes['email'];
        if($loginField == 'email') {
            unset($attributes['username']);
        } elseif($loginField == 'username') {
            unset($attributes['email']);
        };


        if (!auth()->attempt($attributes, $remember)) {
            throw ValidationException::withMessages(['email' =>  __('login.fail')  ]);
        }

        session()->regenerate();
        return to_route('dashboard.worldwide');

    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();
        return to_route('login');
    }

}
