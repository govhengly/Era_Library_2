<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    function book_form(){
         return view("book_register");
    }
    function book_register(Request $request){
        if($request->hasFile('photo')){
//            dd($request);
            $photo=$request->file('photo');
            $filename=time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save(public_path('/image/'.$filename));
        }
        $book=new Library();
        $book->title=$request->title;
        $book->category=$request->category;
        $book->type=$request->type;
        $book->author=$request->author;
        $book->barcode=$request->barcode;
        $book->manager=$request->manager;
        $book->count=$request->count;
        $book->save();

//       return redirect()->Action('AdminController@admin_form');
        $JSON=array();
        $JSON['status']='1';
        return json_encode($JSON);
    }
    function book_get(){
        $book=Library::all();
        $bookA = array();
        $bookA['data'] = $book;
        return json_encode($bookA);
    }
    function book_id($id){
        $book=Library::find($id);
        return $book;
    }
//    function book_list_an(){
//        return $this->belongsTo('App\Library');
//    }

    function book_edit(Request $request, $id){

    $book = Library::find($id); // find book that is id
    return view("book_edit", compact('book','id'));
    }
    function book_update(Request $request,$id){
        $book= Library::find($id);
        $book->title = $request->title;
        $book->category=$request->category;
        $book->type=$request->type;
        $book->author=$request->author;
//        $book->updated_at=new\DateTime();
        $book->update();
        $books=Library::all();

        return view ('book_list', compact('books'));

    }
    function borrow_book($id){
        $book=Library::find($id);
        $user=User::all();

    }

    function list_inf(){
        $books=Library::all();
        return view('book_list',compact('books'));
    }
}
