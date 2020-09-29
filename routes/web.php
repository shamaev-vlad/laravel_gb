<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController};
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\News\{NewsController, CategoryController};

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::view('/about', 'about_us')->name('about');


Route::name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::get('/addrubric', [IndexController::class, 'addCategory'])->name('addCategory');
            Route::get('/addnews', [IndexController::class, 'addNews'])->name('addNews');
        }
    );

    Route::name('news.')
        ->prefix('news')
        ->group(
            function () {

                Route::name('category.')
                    ->group(
                        function () {
                            Route::get('/rubric', [CategoryController::class, 'index'])->name('index');
                            Route::get('/rubric/{slug}', [CategoryController::class, 'show'])->name('show');
                        });

                Route::redirect('/', '/news/rubric');
                Route::get('/newsOne/{id}', [NewsController::class, 'show'])->name('newsOne');
            }
        );

    Auth::routes();
