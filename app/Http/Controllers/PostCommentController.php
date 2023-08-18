<?php

namespace App\Http\Controllers;
use App\Models\Sport;
use App\Models\Comment;

use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    // public function store(Request $request, Sport $sport)
    // {
    //     Comment::create([
    //         'message' => $request->message,
    //         'user_id' => auth()->user()->id,
    //         'sport_id' => $sport->id,
    //     ]);
        
        
        
    //     return redirect()->back();
    // }
    // public function store(Request $request, Sport $sport)
    // {
    //     Comment::create ([
    //         'sport_id' => $sport->id,
    //         'user_id' => auth()->id(),
    //         'message' => $request->message,
    //     ]);
    //     dd($sport);
    // }
}
