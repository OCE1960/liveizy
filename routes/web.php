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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/staff_creation', 'DashboardController@staff')->name('staff_creation');
Route::get('/department_creation', 'DashboardController@department')->name('department_creation');
Route::get('/department_list', 'DashboardController@department_list')->name('department_list');
Route::post('/createstaff', 'CreateController@staff')->name('createstaff');
Route::post('/createdepartment', 'CreateController@department')->name('createdepartment');
Route::post('/createStaffRole', 'CreateController@staff_role')->name('createStaffRole');
Route::get('role_creation/{id}', 'DashboardController@view')-> where('id','[0-9]+');
Route::get('detail/{id}', 'DashboardController@detail')-> where('id','[0-9]+');
Route::get('role/{id}', 'DashboardController@role');
Route::delete('delete/{id}', 'CreateController@destroy')-> where('id','[0-9]+');
Route::get('/', 'DashboardController@home')->name('dashboard');
