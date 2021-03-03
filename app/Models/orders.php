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
    use SoftDeletes;
}
