<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
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
Route::get('/categories', [CategoryController::class, 'index'])
->name('categories.index');;

Route::get('/categories/{name}', [CategoryController::class, 'show'])
->where('name', '\w+')
->name('categories.show');

Route::get('/news', [NewsController::class, 'index']) ->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
->where('id', '\d+')
->name('news.show');

Route::get('/info', function() {
    return phpinfo();
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/', AdminIndexController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});