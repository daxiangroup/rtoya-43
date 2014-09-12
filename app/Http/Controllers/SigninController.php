<?php namespace Rtoya\Http\Controllers;

use \Illuminate\Routing\Controller;
use \Input;
use \Redirect;
use \View;
use Rtoya\Services\SigninService;

class SigninController extends Controller {

    private $service;

    public function getForm()
    {
        // return View::make('signin::signin');
        // return view('signin.signin');
        return View::make('signin.signin');
    }

    public function postSignin(SigninService $service)
    {
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        ];

        if ($service->login($credentials)) {
            return Redirect::route('dashboard');
        }

        return Redirect::route('signin');
    }

    public function getForgotPassword()
    {
        return 'forgot password';
    }

    public function getLogout(SigninService $service)
    {
        $service->logout();

        return Redirect::route('signin');
    }
}
