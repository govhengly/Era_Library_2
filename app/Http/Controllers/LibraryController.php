<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    function book_form(){
         return view("book_register");
    }
    function book_register(Request $request){
        $book=new Library();
        $book->title=$request->title;
        $book->category=$request->category;
        $book->type=$request->type;
        $book->author=$request->author;
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

    function list_inf(){
        $books=Library::all();
        return view('book_list',compact('books'));
    }
}
