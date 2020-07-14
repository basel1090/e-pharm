<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $hasher = app('hash');
        if ($user && $hasher->check($request->password, $user->password)) {
            if($user->is_active){
                $token = $user->createToken('Bearer')->accessToken;
                return response()->json(["access_token"=>$token]);
            }
            else{
                return response()->json(["status"=>0,"message"=>"User is not Active"]);
            }
        }
        else{
            return response()->json(["status"=>0,"message"=>"Invalid Username or Password"]);
        }
    }
    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole("customer");
        return $user;
        /*[
            "id"=>$user->id,
            "name"=>$user->name,
            "email"=>$user->email
        ];*/
    }
}
