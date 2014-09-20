<?php namespace Rtoya\Http\Controllers;

use Illuminate\Routing\Controller;
use View;
use Rtoya\Http\Requests\SignupRequest;

class SignupController extends Controller {

    public function getIndex()
    {
        return View::make('signup.signup');
    }

    public function postSignup(SignupRequest $signupRequest)
    {
        dd("here we are");
    }

}
