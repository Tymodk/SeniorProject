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
    Route::post('/upload', 'TeachersController@upload')->name('admin.upload');
    Route::get('/teachercourses', 'TeachersCoursesController@index')->name('tc.index');
    Route::get('teachercourses/add/{id}', 'TeachersCoursesController@addCourse')->name('tc.add');
    Route::get('/teachercourses/{id}', 'TeachersCoursesController@single')->name('tc.single');
    Route::get('teachercourses/{teacherid}/{courseid}/', 'TeachersCoursesController@deleteCourse')->name('tc.delete');
    
    Route::get('/studentcourses', 'StudentsCoursesController@index')->name('sc.index');
    Route::get('/studentcourses/{name}', 'StudentsCoursesController@addcourse')->name('sc.addcourse');
    Route::get('/studentcourses/{studentid}/{courseid}', 'StudentsCoursesController@deletecourse')->name('sc.addcourse');
    Route::post('/studentcourses/store', 'StudentsCoursesController@store')->name('sc.store');

});
Auth::routes();
