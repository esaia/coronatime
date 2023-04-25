<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:3|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:3|confirmed',
        ];
    }
}
