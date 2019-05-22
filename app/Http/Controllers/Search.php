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

        if(!empty($search)){

            $result = App\Film::where('title', 'LIKE', "%$search%")->get();
            $count_result = count($result) > 0;
            if($count_result){

                    $reply = 'found';

            } else{
                $reply = 'not_found';
            }
        }
        else{
            $reply = 'none';
        }
        return view('Search', compact('reply', 'result'));
    }
}
