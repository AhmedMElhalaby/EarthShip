<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

//        $credentials = request(['email', 'password']);
//        return $this->guard()->attempt($this->credentials($request), $request->filled('remember'));
        if (! $token = $this->guard()->attempt($this->credentials($request), $request->filled('remember'))) {
//        if (! $token = auth()->attempt($credentials)) {
            return $this->sendFailedLoginResponse($request);
        }
//        dd($token);
        if (!Auth::guard('user')->user()->verified) {
            Auth::guard('user')->logout();
            return redirect('verify-email')->with('email',$request->email);
        }
        return redirect('/')->with('token', $token);
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return redirect('verify-email')->with($user->email);
        }
        return redirect()->intended($this->redirectPath());
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
