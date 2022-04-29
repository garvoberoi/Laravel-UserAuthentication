<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_user;
use Hash;
use Session;

class CustomAuth extends Controller
{
    public function login(){
        return view("Auth.login");
    }
    public function signup(){
        return view("Auth.signup");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|min:6|max:50|email|unique:c_users',
            'password' => 'required|min:4|max:20',
            'confirm_password' => 'same:password',
        ]);

        $user = new c_user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if($result){
            back()->with('success','Successfull Registration !!!');
            return redirect('login');
        }
        else{
            return back()->with('failure','Could not register !!!!');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|min:6|max:50|email',
            'password' => 'required|min:4|max:20',
        ]);
        $user = c_user::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('failure','Invalid Password !!!!');
            }
        }
        else{
            return back()->with('failure','Email id NOT Registered !!!!');
        }
    }
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = c_user::where('id','=',Session::get('loginId'))->first();
        }
        return view("Auth.dashboard", compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}