<?php

namespace App\Traits;

use App\Models\Segment;
use App\Models\Subscribe;

trait QueryBuilder
{
    public function queryBuild($segment_id)
    {
        $segment=Segment::with(['groups'=>function($query){
            $query->with("logics");
        }])->where("id",$segment_id)->firstOrFail();
        $subscribe=Subscribe::select('*');
        if($segment->groups){
            foreach ($segment->groups as $key => $value) {
                $subscribe=$subscribe->where(function($query) use($value){
                    if($value->logics){
                        foreach ($value->logics as $l_key => $l_value) {
                            $this->getQuery($query,$l_value,$l_key);
                        }
                    }
                });
            }
        }
        return $subscribe->get();
    }
    public function getQuery($query,$model,$key)
    {
        if($model->logic_type=="between")
        {
            $value=explode(',',$model->value);
            $from=date('Y-m-d',strtotime($value[0]));
            $to=date('Y-m-d',strtotime($value[1]));
            if($key==0){
                return $query->whereBetween($model->field_name,[$from,$to]);
            }else{
                return $query->orWhereBetween($model->field_name,[$from,$to]);
            }
        }
        if($model->logic_type=="after")
        {
            if($key==0){
                return $query->whereDate($model->field_name,">",date('Y-m-d',strtotime($model->value)));
            }else{
                return $query->orWhereDate($model->field_name,">",date('Y-m-d',strtotime($model->value)));
            }
        }
        if($model->logic_type=="before")
        {
            if($key==0){
                return $query->whereDate($model->field_name,"<",date('Y-m-d',strtotime($model->value)));
            }else{
                return $query->orWhereDate($model->field_name,"<",date('Y-m-d',strtotime($model->value)));
            }
        }
        if($model->logic_type=="on")
        {
            if($key==0){
                return $query->whereDate($model->field_name,"=",date('Y-m-d',strtotime($model->value)));
            }else{
                return $query->orWhereDate($model->field_name,"=",date('Y-m-d',strtotime($model->value)));
            }
        }
        if($model->logic_type=="on_or_before")
        {
            if($key==0){
                return $query->whereDate($model->field_name,"<=",date('Y-m-d',strtotime($model->value)));
            }else{
                return $query->orWhereDate($model->field_name,"<=",date('Y-m-d',strtotime($model->value)));
            }
        }
        if($model->logic_type=="on_or_after")
        {
            if($key==0){
                return $query->whereDate($model->field_name,">=",date('Y-m-d',strtotime($model->value)));
            }else{
                return $query->orWhereDate($model->field_name,">=",date('Y-m-d',strtotime($model->value)));
            }
        }
        if($model->logic_type=="is")
        {
            if($key==0){
                return $query->where($model->field_name,"=",$model->value);
            }else{
                return $query->orWhere($model->field_name,"=",$model->value);
            }
        }
        if($model->logic_type=="is_not")
        {
            if($key==0){
                return $query->whereNot($model->field_name,"=",$model->value);
            }else{
                return $query->orWhereNot($model->field_name,"=",$model->value);
            }
        }
        if($model->logic_type=="starts_with")
        {
            if($key==0){
                return $query->where($model->field_name,"LIKE",$model->value.'%');
            }else{
                return $query->orWhere($model->field_name,"LIKE",$model->value.'%');
            }
        }
        if($model->logic_type=="ends_with")
        {
            if($key==0){
                return $query->where($model->field_name,"LIKE",'%'.$model->value);
            }else{
                return $query->orWhere($model->field_name,"LIKE",'%'.$model->value);
            }
        }
        if($model->logic_type=="contains")
        {
            if($key==0){
                return $query->where($model->field_name,"LIKE",'%'.$model->value.'%');
            }else{
                return $query->orWhere($model->field_name,"LIKE",'%'.$model->value.'%');
            }
        }
        if($model->logic_type=="doesnot_starts_with")
        {
            if($key==0){
                return $query->where($model->field_name,"NOT LIKE",$model->value.'%');
            }else{
                return $query->orWere($model->field_name,"NOT LIKE",$model->value.'%');
            }
        }
        if($model->logic_type=="doesnot_end_with")
        {
            if($key==0){
                return $query->where($model->field_name,"NOT LIKE",'%'.$model->value);
            }else{
                return $query->orWhere($model->field_name,"NOT LIKE",'%'.$model->value);
            }
        }
        if($model->logic_type=="doesnot_contains")
        {
            if($key==0){
                return $query->where($model->field_name,"NOT LIKE",'%'.$model->value.'%');
            }else{
                return $query->orWhere($model->field_name,"NOT LIKE",'%'.$model->value.'%');
            }
        }
    }
}
