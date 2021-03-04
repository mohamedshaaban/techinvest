<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;
use App\Scopes\ActiveStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\AreaTransformer;

class books extends Model
{
    protected $table='books';
    protected $fillable= ['title','description','price','shipping_price','discount_precentage','final_price','sold'];

    use SoftDeletes;

}
