<?php

namespace App\Http\Controllers;

use App\subscribe;
use Illuminate\Http\Request;
use DB;

class SubscribeController extends Controller
{
    public function subscription(Request $request)
    {
        $subscriber = auth()->user()->name;
        $subscription = $request->input('subscription');

        $check = DB::select("SELECT * FROM `subscribes` WHERE `subscription`= ? AND `subscriber`= ?", [$subscription, $subscriber]);
        $check = count($check) > 0;

        if ($check)
        {
            $errors[] = 'Вы уже подписаны!';
        }
        if (empty($errors))
        {
            $objComments = new subscribe();
            $objComments = $objComments->create([
                'subscriber' => $subscriber,
                'subscription'  => $subscription
            ]);

            if ($objComments){
                return back();
            }
        }

        return back();
    }
}
