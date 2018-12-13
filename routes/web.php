<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wireframes',function(){
  return view('wireframe');
});

Route::get('/homepage','TeachersController@classes')->middleware('auth')->name('user.index');




Route::get('/wireframe',function ()
{
    return view('wireframe');
});

Route::post('/start-class','ClassesController@start')->middleware('auth')->name('user.start-course');
Route::get('/class','ClassesController@overview')->middleware('auth')->name('user.overview');




Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::resource('courses', 'CoursesController');
    Route::resource('students', 'StudentsController');
    Route::resource('teachers', 'TeachersController');
    Route::post('/upload', 'TeachersController@upload')->name('admin.upload');
    Route::get('/teachers/courses/{id}','TeachersCoursesController@teacher')->name('tc.teacher');
    Route::get('/teachers/courses/add/{id}','TeachersCoursesController@addCourse')->name('tc.create');
    Route::post('/teachers/courses/store/','TeachersCoursesController@storeCourse')->name('tc.store');


    Route::get('/teachercourses', 'TeachersCoursesController@index')->name('tc.index');
    Route::get('teachercourses/add/{id}', 'TeachersCoursesController@addCourse')->name('tc.add');
    Route::get('/teachercourses/{id}', 'TeachersCoursesController@single')->name('tc.single');

    Route::get('teachercourses/{teacherid}/{courseid}/', 'TeachersCoursesController@deleteCourse')->name('tc.delete');

    Route::get('/studentcourses', 'StudentsCoursesController@index')->name('sc.index');
    Route::get('/studentcourses/{name}', 'StudentsCoursesController@addcourse')->name('sc.addcourse');
    Route::get('/studentcourses/{studentid}/{courseid}', 'StudentsCoursesController@deletecourse')->name('sc.addcourse');
    Route::post('/studentcourses/store', 'StudentsCoursesController@store')->name('sc.store');




    Route::get('/classes','ClassesController@index')->name('classes.index');
    Route::get('/classes/create','ClassesController@create')->name('classes.create');
    Route::get('/classes/edit/{id}','ClassesController@edit')->name('classes.edit');
    Route::get('/classes/show/{id}','ClassesController@show')->name('classes.show');
    Route::post('/classes/store','ClassesController@show')->name('classes.store');

});
Auth::routes();
