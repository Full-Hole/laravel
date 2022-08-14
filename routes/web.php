<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/hello/{name}', function(string $name) {
    return "Hello, $name";
});

Route::get('/about', function() {
    return "Some Thing About Me";
});

Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/info', function() {
    return phpinfo();
});