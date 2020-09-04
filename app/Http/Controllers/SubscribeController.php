<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Repository\SegmentInterface;
use App\Repository\SubscribeInterface;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
   /**
     * The subscribe repository instance.
     */
    protected $subscribes;
   /**
     * The segments repository instance.
     */
    protected $segments;

     /**
     * Create a new controller instance.
     *
     * @param  SubscribeInterface  $subscribes
     * @return void
     */
    public function __construct(SubscribeInterface $subscribes,SegmentInterface $segments)
    {
        $this->subscribes=$subscribes;
        $this->segments=$segments;
        $this->middleware(function ($request, $next) {
            \Session::put('top_menu',"subscribe");
            \Session::put('sub_menu',"subscribe");
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['segments']=$this->segments->all();
        return view('admin.subscribe.index',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubscribeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscribeRequest $request)
    {
        $this->subscribes->create($request);
        setMessage('message','success',"Create Successfully");
        return redirect()->route('subscribe.index');
    }
     /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $segment_id=request()->input('segment_id');
        return $this->subscribes->datatableView($segment_id);
    }
    public function test()
    {
        $segment_id=request()->input('segment_id');
        $result=$this->subscribes->datatableView($segment_id);
        dd($result);
    }
}
