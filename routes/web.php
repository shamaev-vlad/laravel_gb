<?php

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

route::view('/', 'index');
route::view('/about', 'about_us');
route::view('/contacts', 'contacts');
