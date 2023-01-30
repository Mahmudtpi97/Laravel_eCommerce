<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class adminAuthController extends Controller
{
        // Admin Registration
    public function register(){
        return view('admin.admin_auth.register');
    }
    public function register_confirm(Request $request){
        $request->validate([
            'username' => 'required',
            'phone'    => 'max:11|min:11',
            'email'    => 'unique:admins',
            'password' => 'required',
        ]);

        $formData   = $request->only('username','phone','email');
        $gePassword = $request->get('password');

    $formData ['password'] =Hash::make($gePassword);

    if (Admin::create($formData)) {
        Session::flash('message','Admin Registration Successfully');
    }
    return redirect()->to('dashboard');

    }

    // Admin Login
    public function login(){
        if (Auth::check()) {
            return redirect()->to('dashboard');
        }
        return view('admin.admin_auth.admin');
    }

    public function login_confirm(Request $request){
        $request->validate([
                    'username'    => 'required',
                    'password'    => 'required',
                ]);
        $formData = $request->only('username','password');

        if (Auth::attempt($formData)) {
            return redirect()->intended('dashboard');
        }
        return redirect()->route('login')->withErrors([ 'Invalid Username and password.']);

    }
    // Admin Logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
