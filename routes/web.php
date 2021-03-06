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
    return view('public/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');

Route::group(['middleware' => ['auth']], function () {
    
    Route::post('/add-category', 'CategoryController@saveCategory');
	Route::get('/category', 'CategoryController@allCategory');
	Route::get('/category/{id}', 'CategoryController@deleteCategory');
	Route::get('/editcategory/{id}', 'CategoryController@editCategory');
	Route::post('/update-category/{id}', 'CategoryController@updateCategory');

	// post
	Route::get('/post', 'PostController@all_posts');
	Route::post('/savepost', 'PostController@savePost');
	Route::get('/delete/{id}', 'PostController@deletePost');
	Route::get('/editpost/{id}', 'PostController@editPost');
	Route::post('/update-post/{id}', 'PostController@updatePost');
});

