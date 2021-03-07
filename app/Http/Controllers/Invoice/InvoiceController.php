<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\books;
use App\Models\orders;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $orders = orders::with('books')->get();
        return ['status'=>'true','orders'=>$orders];
    }

    public function info(Request $request)
    {
        $info = orders::with('books')->whereId($request->id)->first();
        return ['status'=>'true','invoice'=>$info];
    }


    public function save(Request  $request)
    {
         $book = Books::find($request->book_id);
         $invoice = orders::updateOrCreate([

        "book_id" => $request->book_id,
          "customer_name" => $request->customer_name,
          "customer_number" => $request->customer_number,
          "customer_address" => $request->customer_address,
          "unit_price" => $book->final_price,
          "total" => $book->final_price+$book->shipping_price,
          "invoice_number" => $request->invoice_number,
          "invoice_date" => $request->invoice_date,
         ]);
        return   ($invoice);
    }

}
