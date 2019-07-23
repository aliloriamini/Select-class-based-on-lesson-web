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

Route::get('/admin' , 'Admin\PanelController@index');
Route::get('/admin/Weekly_Schedule_Maker' , 'Weekly_Schedule_Maker@index');
Route::resource('/admin/professor' , 'ProfessorController');
Route::post('/classroomFree/import' , 'ClassroomFreeController@import');
Route::post('/classroom/import' , 'ClassroomController@import');
Route::post('/course/import' , 'CourseController@import');
Route::post('/days/import' , 'DaysController@import');
Route::post('/daySeparate/import' , 'DaySeparateController@import');
Route::post('/prFreeTime/import' , 'PrFreeTimeController@import');
Route::post('/professor/import' , 'ProfessorController@import');
Route::post('/professorCourse/import' , 'ProfessorCourseController@import');
Route::post('/usage/import' , 'UsageController@import');
Route::post('/CourseClassRoom/import' , 'CourseClassRoomController@import');
Route::post('/building/import' , 'BuildingController@import');
Route::resource('/admin/course' , 'CourseController');
Route::resource('/admin/classroom' , 'ClassroomController');
Route::resource('/admin/usage' , 'UsageController');
Route::resource('/admin/days' , 'DaysController');
Route::resource('/admin/daySeparate' , 'DaySeparateController');
Route::resource('/admin/prFreeTime' , 'PrFreeTimeController');
Route::resource('/admin/professorCourse' , 'ProfessorCourseController');
Route::resource('/admin/classroomFree' , 'ClassroomFreeController');
Route::resource('/admin/CourseClassRoom' , 'CourseClassRoomController');
Route::resource('/admin/Building' , 'BuildingController');
