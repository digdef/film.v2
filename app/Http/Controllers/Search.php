<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class Search extends Controller
{
    public function index()
    {
        $reply = '';
        $search = $_POST['search'];

        if(!empty($search))
        {
            $result = App\Film::where('title', 'LIKE', "%$search%")->get();
            $count_result = count($result) > 0;
            if($count_result)
            {
                    $reply = 'found';

            } else {
                $reply = 'not_found';
            }
        } else {
            $reply = 'none';
        }

        $categories = DB::table('categories')->get();

        return view('Search', compact('reply', 'result', 'categories'));
    }

    public function categories($id)
    {
        $categories = DB::table('categories')->get();

        $categor = DB::table('categories')->find($id);

        $genre = DB::select("SELECT * FROM `genre` WHERE `categories` = ? ", [$categor->categories]);

        return view('categories', compact('categories', 'genre'));
    }
}
