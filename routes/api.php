<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* blablablablabla */
/* blablablablabla */
/* blablablablabla */
/* blablablablabla */
/* blablablablabla */
/* blablablablabla */

// =================================== ROUTES FOR ANGULAR  ===================================

// HOME PAGE ===================================  
// we dont need to use Laravel Blade 
// we will return a PHP file that will hold all of our Angular content
// see the "Where to Place Angular Files" below to see ideas on how to structure your app return  
Route::get('/', function() {   
    return View::make('angular/index'); // will return app/views/angular/index.php 
});

// API ROUTES ==================================  
Route::resource('comments', 'CommentController', 
        array('only' => array('index', 'store', 'destroy')));

// CATCH ALL ROUTE =============================  
// all routes that are not home or api will be redirected to the frontend 
// this allows angular to route them 
// App::missing(function($exception) { 
//     return View::make('angular/index'); 
// });
