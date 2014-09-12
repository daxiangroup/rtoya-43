<?php namespace Rtoya\Services;

use \Auth;

class SigninService
{
    public function login($credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logout()
    {
        return Auth::logout();
    }
}
