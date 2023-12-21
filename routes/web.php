<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SingleController;

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

// Route::get('/{name?}',function($name= null){
//     $demo = "<h1>Welcome.....</h1>";
//     $data = compact('name', 'demo');
//     return view('home')->with($data);
// });

// Route::get('/',function(){
//     return view('home');
// });

// Route::get('/about',function(){
//     return view('about');
// });
// Route::get('/course',function(){
//     return view('course');
// });
Route::get('/',[DemoController::class,'index']);
Route::get('/about',[DemoController::class,'about']);
Route::get('/courses', SingleController::class);

Route::resource('photo',PhotoController::class);

Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);