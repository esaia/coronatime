<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class ConfirmationController extends Controller
{
    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        auth()->logout();
        return to_route('confirmation.register_confirmation');
    }


    public function resetPassword(ResetRequest $request): RedirectResponse
    {


        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? to_route('password_verify')
                    : back()->withErrors(['email' => __($status)]);

    }

    public function newPass(string $token): View
    {
        return view('authorization.new-password', ['token' => $token]);
    }

    public function update(UpdatePasswordRequest $request): RedirectResponse
    {


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );


        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('confirmation.reset_confirmation')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);


    }


    public function resetConfirmation(): View
    {
        return view('authorization..verify.reset-confirmation');
    }

    public function registerConfirmation()
    {
        return view('authorization.verify.register-confirmation');
    }




}
