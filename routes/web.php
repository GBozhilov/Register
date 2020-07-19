<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::post('/upload', 'UserController@uploadAvatar');


Route::get('/employees', 'EmployeeController@index')
    ->name('employees');

Route::post('/employees', 'EmployeeController@store')
    ->name('employees');

Route::get('/employees/edit/{id}', 'EmployeeController@edit')
    ->name('employee.edit');

Route::post('/employees/update/{id}', 'EmployeeController@update')
    ->name('employee.update');

Route::get('/employees/delete/{id}', 'EmployeeController@delete')
    ->name('employee.delete');

Route::get('/employees/fire/{employee}', 'EmployeeController@fire')
    ->name('employee.fire');

Route::get('/employees/hire/{employee}', 'EmployeeController@hire')
    ->name('employee.hire');