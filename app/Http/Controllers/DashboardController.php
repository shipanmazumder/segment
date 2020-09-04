<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            \Session::put('top_menu',"dashboard");
            \Session::put('sub_menu',"dashboard");
            return $next($request);
        });
    }
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }
}
