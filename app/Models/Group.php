<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $fillable=['group_set','segment_id'];

    public function logics(){
        return $this->hasMany(\App\Models\Logic::class);;
    }
}
