<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
//    public function __construct(){
//        $this->middleware('guest')->except('logout');
//        $this->middleware('guest:admin')->except('logout');
//        $this->middleware('guest:owner')->except('logout');
//    }
    public function showLoginForm(){
        return view('auth.login', ['route' => route('login'), 'title'=>'Tenant']);
    }
    public function showAdminLoginForm(){
        return view('auth.login', ['route' => route('admin.login-view'), 'title'=>'Admin']);
    }
    public function showOwnerLoginForm(){
        return view('auth.login', ['route' => route('owner.login-view'), 'title'=>'Owner']);
    }
    public function adminLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (\Auth::guard('admin')->attempt($request->only('email','password'), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public function ownerLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (\Auth::guard('owner')->attempt($request->only('email','password'), $request->get('remember'))){
            return redirect()->intended('/owner/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
