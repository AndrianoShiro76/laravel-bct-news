<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardSportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sports.index', [
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
        return view('dashboard.sports.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        // return $request->file('image')->store('sport-images');


        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:sports',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('sport-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Sport::create($validateData);

        return redirect('/dashboard/sports')->with('success', 'New post has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        return view('dashboard.sports.show', [
            'sport' => $sport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        return view('dashboard.sports.edit', [
            'sport' => $sport,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];
        
        if($request->slug != $sport->slug) {
            $rules['slug'] = 'required|unique:sports';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('sport-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Sport::where('id', $sport->id)->update($validateData);

        return redirect('/dashboard/sports')->with('success', 'Post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {   
        if($sport->image) {
            Storage::delete($sport->image);
        }
        Sport::destroy($sport->id);
        return redirect('/dashboard/sports')->with('success', 'A post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Sport::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
