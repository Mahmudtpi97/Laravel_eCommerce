<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Social;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersLogRegiController extends Controller
{
    public function user_login(){
        $this->data['socials']        = Social::all()->where('status',1);
        $this->data['categories']     = Category::with('SubCategory')->where('status',1)->get();
        $this->data['products']       = Product::all()->where('status',1);
        $this->data['cartItems']      = \Cart::getContent();


        return view('users.login_check',$this->data);
    }
    public function user_login_confirm(Request $request){

        $request->validate([
            'email'       => 'required',
            'password'    => 'required',
        ]);
        $email        = $request->email;
        $getPassword  = $request->password;

        // $getPassword = $request->input('password');
        $user = User::where('email', '=', $email)->first();


        // $password = User::get('password');
        // $password2 = Hash::check($getPassword, $password);

        // $password = Hash::make($getPassword);


        $user = User::where('email','=', $email)->first();

        //  dd($password2);

        if (Hash::check($getPassword, $user->password) ) {
            Session::put('id',$user->id);
            return redirect()->to('checkout');
            // return return redirect()->back()->withErrors($validator)->withInput();
        }
        return redirect()->to('user_login')->withErrors([ 'Invalid Email and Password.']);
    }

    public function user_registration(Request $request){
          $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'number' => 'required|numeric',
                'password' => 'required',
           ]);

        $formData = $request->only('name','email','number');
        $getPassword = $request->get('password');
        $password = Hash::make($getPassword);

        $formData ['password'] = $password;

        if (User::create($formData)) {
            Session::flash('message','User Registration Successfully');
        }
        $id = User::insertGetId($formData);

        Session::put('id',$id);
        Session::put('name',$request->name);

        return redirect()->to('checkout');
    }

    public function user_logout(){
         Session::flush();
         return redirect()->to('/');
    }
}
