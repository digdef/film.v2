<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use Hash;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = auth()->user()->name;

        $subscriptions  = DB::select("SELECT * FROM `subscribes` WHERE `subscriber` = ?", [$name]);      

        return view('home', compact('subscriptions'));
    }

    public function update()
    {
      $id = auth()->user()->id;

      if (isset($_POST['do_avatar1'])) {
        DB::update("UPDATE `users` SET `avatar` = 'avatar1.png' WHERE `users`.`id` = ?", [$id]);  
      }

      if (isset($_POST['do_avatar2'])) {
        DB::update("UPDATE `users` SET `avatar` = 'avatar2.png' WHERE `users`.`id` = ?", [$id]);  
      }

      if (isset($_POST['do_avatar3'])) {
        DB::update("UPDATE `users` SET `avatar` = 'avatar3.png' WHERE `users`.`id` = ?", [$id]);  
      }

      return back();
    }

    public function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',     
      ], $messages);

      return $validator;
    }

    public function postCredentials(Request $request)
    {
      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
          return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {  
          $current_password = Auth::User()->password;           
          if(Hash::check($request_data['current-password'], $current_password))
          {           
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save(); 
            return "ok";
          }
          else
          {           
            $error = array('current-password' => 'Please enter correct current password');
            return response()->json(array('error' => $error), 400);   
          }
        }        
      }
      else
      {
        return redirect()->to('/');
      }    
    }
}
