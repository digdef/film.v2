<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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
        return view('film', compact('film'));
    }
}