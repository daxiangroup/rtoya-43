<?php namespace Rtoya\Http\Controllers;

use Illuminate\Routing\Controller;
use \View;

class DashboardController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function getIndex()
    {
        return View::make('dashboard.dashboard');
    }

    public function getFarts()
    {
        return 'ding';
    }
}
