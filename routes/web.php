<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::resource('courses', 'CoursesController');
    Route::resource('students', 'StudentsController');
    Route::resource('teachers', 'TeachersController');
    Route::post('/upload','TeachersController@upload')->name('admin.upload');
    Route::get('/teachercourses','TeachersCoursesController@index')->name('tc.index');
});
Auth::routes();
