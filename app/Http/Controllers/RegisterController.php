<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function registrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([      
            'name'=> 'noname',
            'status' => 1,
            'is_admin' => 0,
            'photo' => 'no-photo.jpg',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Registration successful');
    }
}
