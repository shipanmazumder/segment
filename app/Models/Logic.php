<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logic extends Model
{
   use SoftDeletes;
    protected $fillable=['group_id','field_name','logic_type','value'];
}
