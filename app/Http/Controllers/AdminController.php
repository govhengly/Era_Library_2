<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function admin_form()
    {
        return view('admin_register');
    }

    function admin_register(Request $request)
    {
        $user_password = $request->input('password');
        $user_password = Hash::make($user_password);
        $admin = new Admin();
        $admin->username = $request->input('username');
        $admin->password = $user_password;
        $admin->save();

//        dd($admin);
        $JSON = array();
        $JSON['status'] = "1";
        return json_encode($JSON);
    }

    function admin_get()
    {
        $admin = Admin::query()->get();
//        $JSON=array();
//        $JSON['status']="1";
//        $JSON["data"]=$admin->getDate();
        return json_encode($admin);
    }

    function admin_check()
    {
        return view('admin_login');
    }

    function admin_login()
    {

        $data = Admin::where('username', request('username'))->first();
        if(Hash::check(request('password') , $data->password)){
            return 'right pass';
        }else{
            return 'wrong pass';
        }

//        dd(csrf_token());
//        dd(request()->all());
//        $data = Admin::where([
//            ['username', request('username')],
//            ['password', request('password')]
//        ])->first();
        if (count($data) > 0) {
            echo "true";
        } else {
            echo 'false';
        }
    }

}
