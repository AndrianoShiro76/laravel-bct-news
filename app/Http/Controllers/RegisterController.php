<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'

        ]);
    }

    public function store(Request $request)
    {
        // return $request->file('image')->store('user-images');
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            // 'image' => 'image|file|max:1024',
            'password' => 'required|min:5|max:255'
        ]);
        
        
        
        // $validateDate['password'] = bcrypt($validateDate['password']);
        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('sport-images');
        // }
        $validateData['password'] = Hash::make($validateData['password']);
        
        User::create($validateData);

        // session()->flash('success', 'Registration succesfull. Please login');

        return redirect('/login')->with('success', 'Registration succesfull. Please login');

    }

    
}
