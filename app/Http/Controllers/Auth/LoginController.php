<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function credentials(Request $request){
      
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
        return ['email'=>$request->email, 'password'=>$request->password];
       }
       return ['username'=>$request->email, 'password'=>$request->password];
    }
    public function username(){
      return 'email';
    }
// ________handle the validation of login form___________________
    // public function login(Request $request)
    // {
        
        // $data=$request->validate([
        //     'email'=>'required|email',
        //     'password'=>'required',
        // ]);
        // if(Auth::attempt($data)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('admin .adduser');
        // }
        // return back()->witherrors([
        //     'email'=>'the email and password doesnt match',
        // ]);

   
} 
