<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Upload;
use App\User;
use App\Users;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\validate;

class AdminController extends Controller
{
    //
    function admin_form()
    {
        return view('admin_register');
    }

    function admin_register(Request $request)
    {
        /* $validator= $request->validate([
             'username'=> 'required',
             'password'=>'required',
             'photo'=>'required'

         ]);
         if ($validator==false){
             print_r(false);
         }else{
            $photo= $request->file('photo');
            $photo->move(public_path('/image'),$photo->getClientOriginalName());

            $data= Admin::create([
                 'username'=>$request->username,
                 'password'=>$request->password,
                 'photo'=> $request->photo->getClientOriginalName()
             ]);
            $data->save();
            dd($data);

         }*/
        //        $admin=new Admin();
//        if($request->hasFile('photo')) {
////            dd($request);
//            $photo = $request->file('photo');
//            $filename = time() . '.' . $photo->getClientOriginalName();
//            Image::make($photo)->resize(300, 300)->save(public_path('/image/' . $filename));
//            $admin->photo = $filename;
//            $password = $request->input('password');
//            $passwords = Hash::make($password);
//            $admin->username = $request->username;
////        $password=Hash::make('password',[$request->password]);
//            $admin->password = $passwords;
//
//            $admin->save();
//            dd($admin);
//        }
//        $image = base64_decode($request->input('image'));
////        $image_name= "file_namess.png";
//        $image_name=$request->input('user').'.png';
//        $path = public_path() . "/image/" . $image_name;
//
//        file_put_contents($path, $image);
//        if ($request->hasFile('image')){
//            $image = base64_decode($request->input('image'));
////        $image_name= "file_namess.png";
//            $image_name=$request->input('user').'.png';
//            $path = public_path() . "/image/" . $image_name;
//
//            file_put_contents($path, $image);
//        }

        $user_password = $request->input('password');
        $user_password = Hash::make($user_password);
        $admin = new Admin();
        $admin->username = $request->input('username');
        $admin->password = $user_password;
        $admin->save();

        $JSON = array();
        $JSON['status'] = "1";
        $JSON['data'] = Admin::query()->where('username', $request->input('username'))->first();
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
//        username$request->username;
        $data = Admin::where('username', request('username'))->first();
        $JSON = array();
        if (Hash::check(request('password'), $data->password)) {
            $JSON['status'] = "1";
        } else {
            $JSON['status'] = "0";

        }
        return json_encode($JSON);
    }
//        dd(csrf_token());
//        dd(request()->all());
//        $data = Admin::where([
//            ['username', request('username')],
//            ['password', request('password')]
//        ])->first();

//        if (count($data) > 0) {
//            return $data->username;
//        } else {
//            echo 'false';
//        }

//    function admin_list_user(){
//        $user=Users::all();
//        return $user;
//    }

    public function admin_upload(Request $request)
    {
        $image = base64_decode($request->input('image'));
        $image_name = $request->input('user') . '.png';
        $path = public_path() . "/image/" . $image_name;

        file_put_contents($path, $image);

        $upload = new Upload();
        $upload->photo = "/image/" . $image_name;
        $upload->save();
        return 'true';
        /*        if($request->hasFile('photo')) {
        //            dd($request);
                    $photo = $request->file('photo');
                    $filename = time() . '.' . $photo->getClientOriginalName();
                    Image::make($photo)->resize(300, 300)->save(public_path('/image/' . $filename));
                    return 'true';

               if ($request->hasFile('photo')){ $image = base64_decode('photo');
                $fp = fopen('public/image','wb+');
                fwrite($fp,$image);
                fclose($fp);


            }
           else
               return false;*/
    }
}