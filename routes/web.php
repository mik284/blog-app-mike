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
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registered/users', 'HomeController@getRegisteredUsers')->name('registered_users');
Route::get('/all/posts', 'HomeController@PostList')->name('all_posts');
Route::get('/create/post', 'HomeController@createPost')->name('create_post');
Route::post('/store/post', 'HomeController@storePost')->name('store_new_post');
Route::get('/edit/post/{post_id}', 'HomeController@editPost')->name('edit_post_form');
Route::post('/update/post/{post_id}', 'HomeController@updatePost')->name('update_post');
Route::post('/delete/post/{post_id}', 'HomeController@deletePost')->name('delete_post');
