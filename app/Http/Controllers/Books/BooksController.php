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
        $book = books::updateOrCreate(['id'=>$request->id],[

        "title" => $request->title,
          "description" => $request->description,
          "price" => $request->price,
          "shipping_price" => $request->shipping_price,
          "discount_precentage" => $request->discount_precentage,
          "final_price" => $request->final_price,
          "sold" => $request->sold == true ? 1 : 0
        ]);
        return   ($book);
    }
    public function delete(Request  $request)
    {
        Books::where('id',$request->id)->delete();
        $books = books::all();
        return ['status'=>'true','books'=>$books];
    }
}
