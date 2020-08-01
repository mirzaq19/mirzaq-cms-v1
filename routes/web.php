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

// === Home || Blog === //
Route::get('/', 'BlogController@index')->name('blog');
Route::get('/p/{slug}', 'BlogController@pos')->name('pos');
Route::get('/list-kategori/{category}', 'BlogController@listcategory')->name('cate');
Route::get('/list-tag/{tag}', 'BlogController@listtag')->name('tag.post');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    // ==== Dashboard === //
    Route::get('/dashboard', 'DashboardController@view')->name('dashboard');

    // ==== Category === //
    Route::resource('/category', 'CategoryController');

    // ==== Tag === //
    Route::resource('/tag', 'TagController');

    // ==== Post === //
    Route::get('/post/trashed','PostController@trashed')->name('post.trash');
    Route::get('/post/{id}/restore','PostController@restore')->name('post.restore');
    Route::delete('/post/{id}/kill','PostController@kill')->name('post.kill');
    Route::resource('/post', 'PostController');

    // ==== User === //
    Route::resource('/user', 'UserController');
});


