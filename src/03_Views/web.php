<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PageController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
//use App\Http\Controllers\ArticlesController;
//use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\View;

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

//Route::get('/', function () {
    //return view('Welcome');
//});
Route::get('/', function () {
    return 'Selamat Datang';
});

/*Route::get('/about', function () {
    return '1941720047, Ella Amelia W';
});
Route::get('/articles/{id}', function ($id) {
    return 'Halaman dengan ID'.$id;
});*/

//Route::get('/Home', [PageController::class, 'Home']);
//Route::get('/about', [PageController::class, 'about']);
//Route::get('/articles', [PageController::class, 'articles']);

//Route::get('/Home', [HomeController::class, 'Home']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'articles']);
Route::get('/hai' ,[WelcomeController::class, 'hai']);



Route::get('/hello', function () {
    return view('coba.hello',
    [
        'nim' => 'Ella',
        'pekerjaan' => 'Mahasiswa'
    ]);  
    


//Route::get('/hello', function () {
   // return view('coba.hello', ['nim' => '1941720047']);
   // });


    

});
Route::get('/Home', function(){
    return view('home');
});
Auth::routes();
Route::prefix('/product') -> group(function(){
    Route::get('/product1', [ProductController::class, 'product1']);
    Route::get('/hello1', [ProductController::class, 'hello1']);
});
Route::get('/news/{id}', function ($id) {
    return view('news').$id;
});
Route::prefix('/program') -> group(function(){
    Route::get('/program', [ProgramController::class, 'karir']);
});
Route::get('/about', function () {
    return view('about-us');
});
Route::resource('/contact-us', ContactController::class)->only([
    'contact-us', 'show'
   ]);