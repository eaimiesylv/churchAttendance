<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewUserEvent;
use App\Services\LoginField;


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
    public function showLoginPage()
    {
        
        return view('auth.login');
    }
    public function showLoginForm(LoginField $loginFormFields)
    {
        //This pass all the form fields  as api request
       return json_encode($loginFormFields);
       
    }
   
    // Controller method
    protected function authenticated(Request $request, $user)
    {
        //dd('ok');
        if ($user->is_admin == 0) {
           
            return redirect()->route('home');
        } 
        
           return redirect()->route('dash');        
       
    }
            
            public function login(Request $request)
        {
        
            $detail=$request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('/');
            }
           
            return redirect()->back()
                ->withErrors(
                   // [
                    ['email' => 'These credentials do not match our records.'],
                    //['password' => 'This password does not exist.']
                    //]
                )
                ->withInput($request->only('email'));
        }

   

}
