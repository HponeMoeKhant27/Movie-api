<?php

namespace Movie\Api\Auth\Validators;

use Illuminate\Support\Facades\Validator;

class AuthValidator
{
    public function isValid($inputs)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => "The email field is required.",                           
            'email.email' => "The email format is invalid.",                     
            'password.in' => "The password field is required.",                   
        ];

        $data = [];
        $data = $inputs->only('email', 'password');
        
        return Validator::make($data, $rules, $messages);
    }
}