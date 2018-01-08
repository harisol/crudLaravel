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

// routes without parameter and return view
Route::get('/view-only', function () {
    return view('withoutparameter');
});

// routes with optional parameter and return view
Route::get('/view-with-parameter/{first?}/{second?}', function ($first = 'Not set', $second = 'Not set') {
	return view('withparameter', compact('first', 'second'));
});

// routes with required parameter and return data only
Route::get('/required-parameter/{first}/{second}', function ($first, $second) {
	return 'Display data only (without view) with required parameter<br/><br/>Param1 : '.$first.'<br/>Param2 : '.$second;
});

// routes with optional parameter and return data only
Route::get('/optional-parameter/{first?}/{second?}', function ($first = 'Not set', $second = 'Not set') {
	return 'Display data only (without view) with optional parameter<br/><br/>Param1: '.$first.'<br/>Param2 : '.$second;
});

// routes to controller
Route::get('/home', 'BelajarController@index');
Route::get('/main/page1', 'BelajarController@getPage');

Route::get('/one-to-one/user', 'BelajarController@getOne');
Route::get('/one-to-one/profile/{nama}', 'BelajarController@hasOne');

Route::get('/one-to-many', 'BelajarController@getOneMany');
Route::get('/many-to-one', 'BelajarController@getManyOne');

Route::get('/many-to-many/{name?}', 'BelajarController@getManyToMany');

Route::get('/has-many-through/{id?}', 'BelajarController@hasManyThrough');


// CRUD

Route::group(['prefix' => 'kendaraan'], function(){

	Route::get('/', 'KendaraanController@index');
	Route::get('/create', 'KendaraanController@create');
	Route::post('/store', 'KendaraanController@store');
	Route::get('/show/{id}', 'KendaraanController@show');
	Route::post('/update/{id}', 'KendaraanController@update');
	Route::get('/destroy/{id}', 'KendaraanController@destroy');

});

// Display all SQL executed in Eloquent
// \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//     print_r($query->sql);
// });
