<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function emailconfirm()
    {
        return view('authorization.email-confirmation');

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
        return view('authorization.reset-confirmation');
    }

    public function registerconfirmation()
    {
        return view('authorization.register-confirmation');
    }

}
