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

    use SoftDeletes;

}
