<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index() {

        return view('login');
    }

    public function login(Request $request) {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'status' => 1,
            'is_admin' => 1
        ])){
            return redirect('/admin');
        }else if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'status' => 1,
            'is_admin' => 0
        ])){
            return redirect('/user');
        }

       
        return redirect()->back()->with('status','Wrong Login or Password');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
