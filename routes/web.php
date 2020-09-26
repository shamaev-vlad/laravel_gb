<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController};
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\News\NewsController;

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

// $sitePages = [
// 	'/'=>'Test@index',
// 	'/about' => 'Test@about',
// 	'/contacts' => 'Test@contacts'
// ];
//
// foreach ($sitePages as $route => $page) {
//
// 	Route::get($route, $page);

// }

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about_us', [HomeController::class, 'about'])->name('about');


Route::name('admin.')
    ->prefix('admin')
    ->group(
        function() {
            Route::get('/', [IndexController::class, 'index'])->name('index');
        }
    );

Route::name('news.')
    ->prefix('news')
    ->group(
        function (){
            Route::get('/', [NewsController::class, 'index'])->name('news');
            Route::get('/newsOne/{id}', [NewsController::class, 'show'])->name('newsOne');
            Route::get('/rubric/{cat_id}',[NewsController::class, 'showByCategory'])->name('byCategory');
        }
    );
