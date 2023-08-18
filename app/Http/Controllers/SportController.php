<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\User;
use App\Models\Category;
use App\Models\Sportcomment;

class SportController extends Controller
{
    public function index ()
    {
        return view('sports', [
            "title" => "Sports",
            "categories" => Category::get(),
            "sports" => Sport::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function show (Sport $sport)
    {
        return view('sport', [
            "title" => "Sports",
            "sport" => $sport,
            "users"=> User::get(),
            "sports" => Sport::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
            "categories" => Category::get(),
        ]);
    }

    public function sportcomment(Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id
        ]);
        Sportcomment::create($request->all());
        return redirect()->back();
    }

    

    


}
