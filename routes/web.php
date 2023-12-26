<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SingleController;
use App\Models\Customer;
use Illuminate\Http\Request;

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
// Route::get('/',[DemoController::class,'index']);
// Route::get('/about',[DemoController::class,'about']);
// Route::get('/courses', SingleController::class);

// Route::resource('photo',PhotoController::class);

Route::get('/', function(){
    return view('index');
});



Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);

Route::group(['prefix' => '/customer'], function(){
    Route::get('/delete/{id}',[CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/restore/{id}',[CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('/force-delete/{id}',[CustomerController::class, 'forceDelete'])->name('customer.force-delete');
    Route::get('/edit/{id}',[CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}',[CustomerController::class, 'update'])->name('customer.update');
    Route::get('/create',[CustomerController::class, 'create'])->name('customer.create');
    Route::get('',[CustomerController::class,'view']);
    Route::get('/trash',[CustomerController::class,'trash']);
    Route::post('/',[CustomerController::class, 'store'])->name('customer.store');

});

Route::get('get-all-session',function(){
    $session = session()->all();
    p($session);
});
Route::get('set-session', function (Request $request) {
    $request->session()->put('user_name', 'Ram');
    // $request->session()->flash('status', 'Success');
    return redirect('get-all-session');
});

Route::get('destroy-session',function(){
    session()->forget('user_name');
    return redirect('get-all-session');
});