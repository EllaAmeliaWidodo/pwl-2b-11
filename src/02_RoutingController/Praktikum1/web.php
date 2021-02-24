<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;


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

Route::get('/Home', [HomeController::class, 'Home']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'articles']);