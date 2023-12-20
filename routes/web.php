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

// Route::get('/demo/{name}/{id?}', function ($name,$id = null) {
//     //$data convert variable into array
//    $data = compact('name', 'id');
//    return view('demo')->with($data);
// });

// Route::get('/demo',function(){
//     echo "Hello !!" ;
// });

// Route::any('/test', function(){
//     echo "Testing the route";
// });

Route::get('/{name?}',function($name= null){
    $demo = "<h1>Welcome.....</h1>";
    $data = compact('name', 'demo');
    return view('home')->with($data);
});
