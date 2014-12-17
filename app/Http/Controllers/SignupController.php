<?php namespace Rtoya\Http\Controllers;

use Auth;
use Input;
use Redirect;
use User;
use View;
use Illuminate\Routing\Controller;
use Rtoya\Http\Requests\SignupRequest;
use Rtoya\Services\AccountService;

class SignupController extends Controller {

    public function getIndex()
    {
        return View::make('signup.signup');
    }

    public function postSignup(SignupRequest $signupRequest, AccountService $accountService)
    {
        $values = [
            'email'       => Input::get('email'),
            'newpassword' => Input::get('password'),
        ];
        $user = $accountService->prepareSave(new User, $values);

        // TODO: validate user was created properly and auth'ed in before redirecting to dashboard
        $user->save();

        Auth::login($user, true);

        return Redirect::route('dashboard');
    }

    public function getWelcome()
    {
        return View::make('signup.welcome');
    }
}
