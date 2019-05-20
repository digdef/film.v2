<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class MainPageController extends Controller
{
    public function index()
    {
        $films = App\Film::all();
        return view('welcome', compact('films'));
    }

    public function filmPage($id)
    {

        $film = App\Film::find($id);
        $id = $film->id;

        $comments = DB::select("SELECT * FROM `comments` WHERE `film_id` = ? ORDER BY `id` DESC", [$id]);
        $commentss = count($comments) <= 0;

        return view('film', compact('film', 'comments', 'commentss'));
    }
}