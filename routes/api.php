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

Route::get('/my-classes','TeachersController@myClasses');
Route::post('/classes','TeachersController@storeclasses');
Route::get('/classes/absent/{classid}','ClassesController@api_class_absent');
Route::get('/classes/present/{classid}','ClassesController@api_class_present');

Route::get('/newPrecense/{studentCardID}', 'PresencesController@store');

Route::middleware('auth:api')->group(function() {

});



