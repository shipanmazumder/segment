<?php

namespace App\Http\Controllers;

use App\Http\Requests\SegmentRequest;
use App\Repository\SegmentInterface;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    /**
     * The segments repository instance.
     */
    protected $segments;

     /**
     * Create a new controller instance.
     *
     * @param  SegmentInterface  $segments
     * @return void
     */
    public function __construct(SegmentInterface $segments)
    {
        $this->segments=$segments;
        $this->middleware(function ($request, $next) {
            \Session::put('top_menu',"segment");
            \Session::put('sub_menu',"segment");
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
        return view('admin.segment.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SegmentRequest $request)
    {
        $segment=$this->segments->create($request);
        if($segment){
            setMessage('message','success',"Create Successfully");
        }
        else{
            setMessage('message','danger',"Something Wrong!");
        }
        return redirect()->route('segment.index');
    }
     /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return $this->segments->datatableView();
    }
}
