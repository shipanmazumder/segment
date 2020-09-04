<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/","DashboardController@index")->name("dashboard");

Route::get("/subscribe","SubscribeController@index")->name("subscribe.index");
Route::post("/subscribe","SubscribeController@store")->name("subscribe.store");
Route::get("/subscribe/view","SubscribeController@view")->name("subscribe.view");

Route::get("/segment","SegmentController@index")->name("segment.index");
Route::post("/segment","SegmentController@store")->name("segment.store");
Route::get("/segment/view","SegmentController@view")->name("segment.view");

