<?php

namespace App\Http\Controllers;

// -- Models
use App\Models\Film;
use App\Models\Comment;

use Illuminate\Http\Request;

// -- Request
use App\Http\Requests\CommentRequest;

use Auth;

class CommentController extends Controller
{
    public function store( CommentRequest $request, Film $film_slug )
    {
        $data = [
            "user_id"   => Auth::user()->id,
            "film_id"   => $film_slug->id,
            "name"      => Auth::user()->name,
            "comment"   => $request->input( "comment" )
        ];

        Comment::create( $data );

        return back()->with('success', 'You have just successfully submitted comment.');
    }
}
