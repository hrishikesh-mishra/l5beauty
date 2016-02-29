<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });

//Blog Pages; 
Route::get('/', function(){
	return  redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showpost');
Route::get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');

//Admin area 
Route::get('admin', function(){
	return  redirect('/admin/post');
});

Route::group([
		'namespace' => 'Admin',
		'middleware' => 'auth',
	], function(){
		
		Route::resource('admin/post', 'PostController', ['except' => 'show']    );
		Route::resource('admin/tag', 'TagController', ['except' => 'show']);
		Route::get('admin/upload', 'UploadController@index');

        Route::post('admin/upload/file', 'UploadController@uploadFile');
        Route::delete('admin/upload/file', 'UploadController@deleteFile');
        Route::post('admin/upload/folder', 'UploadController@createFolder');
        Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
	}
);

Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');


// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });

// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });

// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

// //     Route::get('/home', 'HomeController@index');
// });
