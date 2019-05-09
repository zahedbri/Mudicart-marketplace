<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserLevel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Route to go to after log in
    public function redirectTo()
    {
        $user = Auth::user();
        switch($user->jenis)
        {
            case UserLevel::SUPERADMIN:
                return route('admin.dashboard');
            case UserLevel::PENJUAL:
                return route('penjual.dashboard');
            case UserLevel::PEMBELI:
                return route('dashboard');
            case UserLevel::DRIVER:
                return route('driver.dashboard');
            default :
                return '/';
        }
    }

    // Column to be used as username
    public function username()
    {
        return 'username';
    }


    public function loggedOut()
    {
        return redirect('login');
    }
}
