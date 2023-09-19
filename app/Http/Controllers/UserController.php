<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function login(Request $request){

    $username = $request->name;
    $password = $request->password;

    $user = array();

    $user = User::where('name', '=', $username)->where('password', '=', $password)->first();

    if($user){

        return response()->json(
            [
                "res_code" => 0,
                "res_desc" => "success",
                "user_data" => $user
            ]
        );


    }else{
        return response()->json(
            [
                "res_code" => -1,
                "res_desc" => "invalid username or password",
                "user_data" => []
            ]
        );
    }

    
   }
}
