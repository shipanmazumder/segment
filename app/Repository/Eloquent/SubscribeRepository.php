<?php

namespace App\Repository\Eloquent;

use App\Models\Subscribe;
use App\Repository\EloquentInterface;
use App\Repository\SubscribeInterface;
use App\Traits\QueryBuilder;
use Yajra\DataTables\Facades\DataTables;

class SubscribeRepository implements SubscribeInterface,EloquentInterface
{
    use QueryBuilder;
    public function all(){
        return Subscribe::orderBy("id","desc")->get();
    }

    public function create($data){
        return Subscribe::create([
            'first_name'=>$data->first_name,
            'last_name'=>$data->last_name,
            'email'=>$data->email,
            'birthday'=>date('Y-m-d',strtotime($data->birthday)),
            'first_name'=>$data->first_name,
        ]);
    }

    public function findById($id){
        return Subscribe::findOrFail($id);
    }

    public function update($data, $id){}

    public function delete($id){}

    public function datatableView($segment_id){
        if($segment_id){
            $subscribes=$this->queryBuild($segment_id);
        }else{
            $subscribes=$this->all();
        }
        return Datatables::of($subscribes)
            ->addIndexColumn()
            ->editColumn("birthday",function($subscribes){
                return date("d-m-Y",strtotime($subscribes->birthday));
            })->make(true);
    }
}
