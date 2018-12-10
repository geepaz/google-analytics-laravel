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

Route::get('/', 'DashboardController@index');

Auth::routes();




//auth
Route::group(['middleware' => 'auth'], function () {

	//dashboard
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

	//analytics
	Route::get('/analytic', 'AnalyticController@index')->name('analytic.index');
	//analytics prefix
	Route::group(['prefix' => 'analytic'], function () {
		//analytic keywords
		Route::get('/keywords', 'AnalyticController@keywords')->name('analytic.keywords');
		//analytic visitors
		Route::get('/visitors', 'AnalyticController@visitors')->name('analytic.visitors');
		//analytic premium
		Route::get('/premium-content', 'AnalyticController@premium')->name('analytic.premium');
		//analytic landing
		Route::get('/landing', 'AnalyticController@landing')->name('analytic.landing');
	
	});

	//profile
	Route::get('/profile', 'ProfileController@index')->name('profile.index');
	Route::patch('/profile/{user}', 'ProfileController@updateProfile')->name('profile.update');

	//profile settings
	Route::get('/profile/settings', 'ProfileController@settings')->name('profile.settings');
	Route::post('/profile/settings', 'ProfileController@password')->name('profile.password');

	//admin
	Route::group(['middleware' => 'check-permission:admin'], function () {

		//connect google analytics account
		Route::resource('/connect', 'ConnectController')->only(['index', 'destroy', 'update']);

		//google oauth callback
		Route::get('/google/oauth', 'GoogleController@oauth')->name('google.oauth');

		//users
		Route::resource('/users', 'UsersController');
		//users prefix
		Route::group(['prefix' => 'users/{user}'], function () {
			//block unblock
			Route::get('/block-unblock', 'UsersController@block')->name('users.block');
		});

	});


	//submission
	Route::resource('/submission', 'SubmissionController')->only(['index', 'destroy']);

	//user
	Route::group(['middleware' => 'check-permission:user'], function () {

		//submission
		Route::get('/submission/form', 'SubmissionController@form')->name('submission.form');
	
		Route::post('/submission/form1', 'SubmissionController@form1')->name('submission.form1');
		Route::patch('/submission/form1/{submission}', 'SubmissionController@form1edit')->name('submission.form1edit');

		Route::patch('/submission/form2/{submission}', 'SubmissionController@form2')->name('submission.form2');
		Route::patch('/submission/form3/{submission}', 'SubmissionController@form3')->name('submission.form3');
		Route::patch('/submission/form4/{submission}', 'SubmissionController@form4')->name('submission.form4');


	});

});