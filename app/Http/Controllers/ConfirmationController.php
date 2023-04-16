<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function emailconfirm()
    {
        return view('authorization.verify.email-confirmation');

    }


    public function reset()
    {
        return view('authorization.reset-password');

    }

    public function newpass()
    {
        return view('authorization.new-password');
    }


    public function resetconfirmation()
    {
        return view('authorization..verify.reset-confirmation');
    }

    public function registerconfirmation()
    {
        return view('authorization.verify.register-confirmation');
    }

}
