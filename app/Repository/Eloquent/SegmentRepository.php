<?php

namespace App\Repository\Eloquent;

use Exception;
use App\Models\Group;
use App\Models\Logic;
use App\Models\Segment;
use Illuminate\Support\Facades\DB;
use App\Repository\SegmentInterface;
use App\Repository\EloquentInterface;
use Yajra\DataTables\Facades\DataTables;

class SegmentRepository implements SegmentInterface,EloquentInterface
{
    public function all(){
        return Segment::orderBy("id","desc")->get();
    }

    public function create($data){
        $insert=false;
        DB::beginTransaction();
        try{
            $segment=Segment::create([
                'name'=>$data->name
            ]);
            $group_set=$data->group_set;
            $logic_data=[];
            foreach($group_set as $group_key=>$group_value){
                $group_key+=1;
                $group=Group::create([
                    'group_set'=>$group_key,
                    'segment_id'=>$segment->id,
                ]);
                $field_names=$data->input('field_name_'.($group_key));
                foreach($field_names as $key=>$value){
                    $logic_data[$key]['group_id']=$group->id;
                    $logic_data[$key]['field_name']=$value;
                    $logic_data[$key]['logic_type']=$data->input('logic_type_'.$group_key)[$key];
                    if(isset($data->input('value_2_'.$group_key)[$key])){
                        $logic_data[$key]['value']=$data->input('value_'.$group_key)[$key].','.$data->input('value_2_'.$group_key)[$key];
                    }else{
                        $logic_data[$key]['value']=$data->input('value_'.$group_key)[$key];
                    }
                }
                Logic::insert($logic_data);
            }
            DB::commit();
            $insert=true;
        }catch(Exception $e){
            DB::rollBack();
        }
        return $insert;

    }

    public function findById($id){
        return Segment::findOrFail($id);
    }

    public function update($data, $id){}

    public function delete($id){}

    public function datatableView(){
        $subscribes=$this->all();
        return Datatables::of($subscribes)
            ->addIndexColumn()
            ->editColumn("birthday",function($subscribes){
                return date("d-m-Y",strtotime($subscribes->birthday));
            })->make(true);
    }
}
