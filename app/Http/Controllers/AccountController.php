<?php namespace Rtoya\Http\Controllers;

use \Auth;
use Illuminate\Routing\Controller;
use \Input;
use \Redirect;
use \User;
use Rtoya\Services\AccountService;
use Rtoya\Services\UserService;

class AccountController extends Controller {
    public function __construct(AccountService $accountService, UserService $userService)
    {
        $this->beforeFilter('auth');

        $this->accountService = $accountService;
        $this->userService    = $userService;
    }

    public function getIndex()
    {
        return view('account.account')
            ->with('user', Auth::user());
    }

    public function getEditSettings($id)
    {
        $user = $this->userService
            ->retrieveUserById($id);

        $formData = $this->accountService
            ->formData($user);

        return view('account::edit-settings')
            ->with('user',     $user)
            ->with('formData', $formData);
    }

    public function getEditPassword($id)
    {
        $user = $this->userService
            ->retrieveUserById($id);

        $formData = $this->accountService
            ->formData($user);

        return view('account::edit-password')
            ->with('user',     $user)
            ->with('formData', $formData);
    }

    public function getEditSocial($id)
    {
        $user = $this->userService
            ->retrieveUserById($id);

        $formData = $this->accountService
            ->formData($user);

        return view('account::edit-social')
            ->with('user',     $user)
            ->with('formData', $formData);
    }

    public function postSave()
    {
        $user = $this->userService
            ->retrieveUserById(Auth::user()->id);

        $values = Input::get('values');

        $user = $this->accountService
            ->prepareSave($user, $values);

        $user->save();
        $user->push();

        return Redirect::route('account');
    }
}
