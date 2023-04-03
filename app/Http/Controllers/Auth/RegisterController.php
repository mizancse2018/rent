<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
//    public function __construct(){
//        $this->middleware('guest');
//        $this->middleware('guest:admin');
//        $this->middleware('guest:owner');
//    }
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegisterForm(){
        return view('auth.register', ['route' => route('register'),'title'=>'Tenant']);
    }

    public function showAdminRegisterForm(){
        return view('auth.register', ['route' => route('admin.register-view'),'title'=>'Admin']);
    }
    public function showOwnerRegisterForm(){
        return view('auth.register', ['route' => route('owner.register-view'),'title'=>'Owner']);
    }

    protected function createAdmin(Request $request){
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('admin');
    }
    protected function createOwner(Request $request){
        $this->validator($request->all())->validate();
        $owner = Owner::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('owner');
    }
}
