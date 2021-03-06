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

Route::group(['middleware' => 'web'], function () {
	Route::auth();

	Route::get('/', function () {
		return view('welcome');
	});

	// apres login
	Route::get('/home', 'HomeController@index');

    // Gestion des articles
    Route::resource('/articles', 'PostController');
    Route::get('/articles/destroy/{$id}', 'PostController@destroy');

	// Gestion des commentaires
    Route::post('/comments', 'CommentsController@store');
    Route::get('comments/{comment}', 'CommentsController@destroy');

    // Gestion de l'administration
    Route::resource('/admin', 'AdminController');

    // Gestion de la page Contact
    Route::resource('/contact', 'ContactController');

    // Gestion des projets
    Route::resource('/projects', 'ProjectController');

    // Gestion des profils
    Route::get('/profile', array('as'=>'profile','before'=>'auth','uses'=>'ProfileController@getProfile'));
    Route::get('/editProfile', array('as'=>'editProfile','before'=>'auth','uses'=>'ProfileController@editProfile'));
    Route::post('/updateProfile', array('as'=>'updateProfile','before'=>'auth','uses'=>'EditProfileController@updatePro'));
        


	
});
