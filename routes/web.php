<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatController;
use App\Models\Cat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cats',[CatController::class,'index']);

Route::get('/cats/show/{id}',[CatController::class,'show']);

Route::get('/cats/create',[CatController::class,'create']);

Route::post('/cats/store',[CatController::class,'store']);

Route::get('cats/edit/{id}',[CatController::class,'edit']);

Route::post('cats/update/{id}',[CatController::class,'update']);

Route::get('cats/delete/{id}',[CatController::class,'delete']);

Route::get('cats/latest/{num}',[CatController::class,'latest']);

Route::get('cats/search',[CatController::class,'search']);

// route to books

Route::get('books',[BookController::class,'index']);

Route::get('/books/show/{id}',[BookController::class,'show']);

Route::get('/books/create',[BookController::class,'create']);

Route::post('/books/store',[BookController::class,'store']);

Route::get('books/edit/{id}',[BookController::class,'edit']);

Route::post('books/update/{id}',[BookController::class,'update']);

// Route auth

Route::get('/register',[AuthController::class,'registerForm']);

Route::post('/register',[AuthController::class,'register']);

// Route::get('cats/test',function(){
//     // select * from cats
//     // $cats= Cat::all();

//     // select * from cats where id > 3
//     // $cats=Cat::where('id','>',2)->get();


//     // select * from cats where id > 1 and name != 'Data Structures and Algorithms'
//     // $cats=Cat::where('id','>',1)->where('name',  '<>' ,'Data Structures and Algorithms')->get();

//     // select * from cats where id > 3 or name = Web Development
//     // $cats=Cat::where('id','>',3)->orWhere('name','=','Web Development')->get();

//     // select * from cats where id > 1 ordered by id DESC limit 2
//     $cats=Cat::where('id','>',1)->orderBy('id','DESC')->take(2)->get();

//     // select count('id') from cats where name <> 'Web Development'
//     // $result=Cat::where('name', '<>' ,'Web Development')->count('id');
//     // dd($result);


//     // select laste inserted row

//     // answer one
//     // $lastitem=Cat::max('created_at');
//     // $result=Cat::where('created_at','=',"$lastitem")->get();

//     // answer two
//     // $result=Cat::orderBy('id','DESC')->take(1)->get();
//     // dd($result);

//     //  take(1)->get() ===== first()
//     // $result=Cat::orderBy('id','DESC')->first();
//     // dd($result);


//     foreach ($cats as $cat) {
//         echo " $cat->id  - $cat->name <br>";
//     }
// });
















