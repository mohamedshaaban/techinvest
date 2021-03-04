<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $books = books::all();
        return ['status'=>'true','books'=>$books];
    }
    public function details(Request $request , $id)
    {
         $book = books::find($id);
         return ['status'=>'true','book'=>$book];
    }

    public function save(Request  $request)
    {
        dd($request->all());
    }
}
