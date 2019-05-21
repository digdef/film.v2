<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
        $nick = auth()->user()->name;
        $avatar = auth()->user()->avatar;
        $text = $request->input('text');
        $film_id = (int)$request->input('film_id');

        $objComments = new Comments();
        $objComments = $objComments->create([
            'nick'    => $nick,
            'avatar'  => $avatar,
            'text'    => $text,
            'film_id' => $film_id
        ]);

        if ($objComments){
            return back();
        }
        return back();
    }
}
