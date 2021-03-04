<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;
use App\Scopes\ActiveStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\AreaTransformer;
 class orders extends Model
{
    protected $table='orders';
     protected $fillable= ['book_id','customer_name','customer_number','customer_address','unit_price','total','invoice_number','invoice_date'];
     use SoftDeletes;
     public function books()
     {
         return $this->hasOne(books::class,'id','book_id');
     }
}
