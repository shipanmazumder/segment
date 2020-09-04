<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Segment extends Model
{
    use SoftDeletes;
    protected $fillable=['name'];

    public function groups(){
        return $this->hasMany(\App\Models\Group::class);;
    }
}
