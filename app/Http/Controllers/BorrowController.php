<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
   public function borrow(Request $request){

       $book_id = $request->input('book_id');
       $user_id = $request->input('user_id');
       $books = Book::query()->find($book_id);
       if ($books->count > 3){
           $borrow= new Borrow();
           $borrow->user_id = $user_id;
           $borrow->book_id = $book_id;
           $borrow->count = $request->input('count');
           $borrow->borrow = $request->input('borrow');
           $res = $borrow->save();
           if ($res) {
               /*$books->count = ($books->count) - 1;
               $books->save();*/
               $status = '1';
           } else {
               $status = '0';
           }
       } else {
           $status = '-1';
       }
       $JSON = array();
       $JSON['status'] = $status;
       return json_encode($JSON);
   }

   function list_borrow(){
       $book=Borrow::all()->where('count','0');
       $list=array();
       $list['data']=$book;
       return json_encode($list);
   }

   function get_borrow(Request $request){
       $book_id= $request->input('book_id');            //id of boook
       $id = $request->input('id');                     // id in borrow primary key ;
       $i=$request->input('number');                   // i   get from admin    accept 1 or  reject 0;
/*
       $borrow = Borrow::query()->find($id);
       $borrow->count = $i;
       $borrow->save();
       */
       $borrows = Book::query()->find($book_id);
       $borrows -> count = ($borrows->count) - $i;
       $borrows -> save();
//       $borrows = Borrow::query()->where('book_id', $book_id)->get();
       dd(count($borrows));

       $JSON = array();
       $JSON['status'] = "1";
       $JSON['data'] = Borrow::query()->where('id', $id)->first();
       return json_encode($JSON);
   }


}
