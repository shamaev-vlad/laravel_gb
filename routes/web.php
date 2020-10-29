<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ProfileController, LoginController};
use App\Http\Controllers\Admin\{IndexController,ExportController, CrudCategoryController, CrudNewsController, UsersController, ParserController};
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

Route::view('/about', 'about_us')->name('about');
Route::view('/ajax', 'ajax')->name('ajax');
Route::post('/toggle', [HomeController::class, 'ajax']);

Route::get('/auth/vk', [LoginController::class, 'loginVK'])->name('vklogin');
Route::get('/auth/vk/response', [LoginController::class, 'responseVK'])->name('vkResponse');

Route::get('/auth/git', [LoginController::class, 'loginGit'])->name('gitlogin');
Route::get('/auth/git/response', [LoginController::class, 'responseGit'])->name('gitResponse');

Route::match(['get','post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(
        function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');

            Route::name('download.')
                ->prefix('download')
                ->group(
                    function () {
                        Route::get('/', [ExportController::class, 'index'])->name('index');
                        Route::get('/news', [ExportController::class, 'newsToJson'])->name('news.json');
                        Route::get('/categories', [ExportController::class, 'categoryToJson'])->name('categories.json');
                        Route::get('/newsxls', [ExportController::class, 'newsToExcel'])->name('news.xls');
                        Route::get('/categoriesxls', [ExportController::class, 'categoryToExcel'])->name('categories.xls');
                    });

           Route::resource('category', CrudCategoryController::class);
           Route::resource('news', CrudNewsController::class);
           Route::resource('user', UsersController::class);
           Route::get('/crudUser', [UsersController::class, 'index'])->name('updateProfile');
           Route::get('/crudUser', [UsersController::class, 'index'])->name('updateProfile');
           Route::get('/crudUser/toggleAdmin/{user}', [UsersController::class, 'toggleAdmin'])->name('toggleAdmin');

           Route::get('/parser', [ParserController::class, 'index'])->name('parser');
           Route::get('/parserNews', [ParserController::class, 'getParsedNews'])->name('parserNews');

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




            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('/newsOne/{news}', [NewsController::class, 'show'])->name('newsOne');
            Route::post('/search', [NewsController::class, 'search'])->name('search');
        }
    );

Auth::routes();

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
