<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('user.cabinet.index', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editForm()
    {
        $user = auth()->user();
        return view('user.cabinet.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userID = auth()->user();  
        $user = User::find($userID->id);
        $request->validate(
            ['name' => 'required',
             'email' => ['required',
                    'email',
                    Rule::unique('users')->ignore($user->id)
                ]            
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/user/edit')->with('success', 'User data updated successfully');
    }
    
    public function posts() {
        $query = Post::query();
        $query->where('status', '=', 1);
        $posts = $query->paginate(10);
        
        return view('user.posts', ['posts'=>$posts]);
    }

    public function updatePhoto(Request $request) {
        $request->validate([
            'photo'  => 'nullable|image'
        ]);

        $userID = auth()->user();  
        $user = User::find($userID->id);       
        $user->uploadPhoto($request->file('photo'));    
        
        return redirect('/user/edit')->with('success', 'User photo updated successfully');
    }

    public function changePassword(Request $request) {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $userID = auth()->user();  
        $user = User::find($userID->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/user/edit')->with('success', 'Password updated successfully');
    }

    public function deleteProfile() {
        $userID = auth()->user();  
        $user = User::find($userID->id);
        $user->status = 0;
        $user->save();
        Auth::logout();

        return redirect('/')->with('success', 'Profile was deleted successfully');
    }
}
