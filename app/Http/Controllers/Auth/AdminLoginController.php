<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }

    protected $guard = "admins";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginAdmin(Request $request)
    {

//        $this->Validate($request, [
//            $this->username() => 'required|email',
//            'password' => 'required|min:6'
//        ]);


        if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            if (Auth::guard($this->guard)->user()->role == config('auth.roles.admin')) {
                return redirect()->intended(route('admin.admin.dashboard'));
            } else {
                return redirect()->intended(route('admin.charity.dashboard'));
            }

        }

        return $this->sendFailedLoginResponse($request);

    }

    public function logout()
    {

        Auth::guard($this->guard)->logout();
        return redirect()->route('admin.auth.login');
    }

    protected function username()
    {
        return 'email';
    }
}
