<?php

namespace App\Http\Controllers;

use App\ERA_User;
use Illuminate\Http\Request;

class ERAUserController extends Controller
{
    function user_form(){
        return view('user_form');
    }
    function user_register(Request $request){
        $user= new ERA_User();
        $user->firstname=$request->input('firstname');
        $user->lastname=$request->input('lastname');
        $user->tel=$request->input('tel');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();

        $JSON=array();
        $JSON['status']="1";
        return json_encode($JSON);
//        return redirect()->Action("UserController@user_login");
    }
    function user_get(){
        $users=ERA_User::all();
        return json_encode($users);
    }
    function user_check(){
        return view('user_login');
    }
    function user_login(){
//        dd(csrf_token());
//        dd(request()->all());
        $data=ERA_User::where([
            ['email', request('email') ],
            ['password',request('password')]
        ])->first();
        if (count($data)>0){
//            return json_encode(new User(true));
            return csrf_token();
            echo 'true';
        }else{
//            return json_encode(new User(false));
            echo 'false';
        }
    }
    function returncost(){
        return csrf_token();
    }
}
