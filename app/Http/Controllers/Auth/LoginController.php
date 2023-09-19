<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        UserActivity::create([
            'user_id' => Auth::id(),
            'login_time' => now(),
            'activity' => 'login',
            'ip_address' => Request::ip()
        ]);
        return '/admin/home';
    }

    public function logout(){
        UserActivity::create([
            'user_id' => Auth::id(),
            'logout_time' => now(),
            'activity' => 'logout',
            'ip_address' => Request::ip()
        ]);

        Auth::logout();
        // Redirect to the login page
        return redirect()->route('login');
    }
}
