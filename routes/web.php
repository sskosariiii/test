<?php

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

use Illuminate\Routing\Router;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('post')->group(function (Router $router) {
    $router->get('/', 'PostController@index')->name('post.index');
    $router->get('/create', 'PostController@create')->name('post.create');
    $router->post('/store', 'PostController@store')->name('post.store');
    $router->get('/show/{id}', 'PostController@show')->name('post.show');
    $router->get('/recently', 'PostController@recently')->name('post.recently');
});
Route::prefix('comment')->group(function (Router $router) {
    $router->post('/create', 'CommentController@create')->name('comment.create');
});