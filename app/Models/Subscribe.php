<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscribe extends Model
{
    use SoftDeletes;
    protected $fillable=['first_name','last_name','email','birthday'];
}
