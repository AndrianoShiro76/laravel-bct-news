<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.index', [
            'sports' => Sport::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            'user' => $user,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'max:255',
            'age' => 'max:255',
            'image' => 'image|file|max:1024',
            'handphone' => 'max:255',
            'school' => 'max:255',
            'country' => 'max:255'
        ];
        
        // if($request->username != $user->username) {
        //     $rules['username'] = 'required|unique:users';
        // }
        // if($request->email != $user->email) {
        //     $rules['email'] = 'required|unique:users';
        // }
        $validateData = $request->validate($rules);
        
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('user-images');
        }
        $validateData['id'] = auth()->user()->id;
        User::where('id', auth()->user()->id)->update($validateData);
   
        return redirect('/dashboard/profile')->with('success', 'Profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
