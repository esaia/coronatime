<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\ResetRequest;
use App\Http\Requests\Login\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class ConfirmationController extends Controller
{
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        auth()->logout();
        return to_route('confirmation.register-confirmation');
    }



    public function emailconfirm()
    {
        return view('authorization.verify.email-confirmation');

    }


    public function passwordconfirm()
    {
        return view('authorization.verify.password-confirmation');
    }




    public function reset()
    {
        return view('authorization.reset-password');

    }

    public function resetPassword(ResetRequest $request)
    {


        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? to_route('password-verify')
                    : back()->withErrors(['email' => __($status)]);

    }

    public function newPass(string $token)
    {

        return view('authorization.new-password', ['token' => $token]);
    }

    public function update(UpdatePasswordRequest $request)
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


    public function resetConfirmation()
    {
        return view('authorization..verify.reset-confirmation');
    }

    public function registerConfirmation()
    {
        return view('authorization.verify.register-confirmation');
    }




}
