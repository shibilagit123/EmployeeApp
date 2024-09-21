<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\ReportController;

Route::get('/',[HomeController::class, 'index'])->name('home');



Route::controller(DepartmentController::class)->group(function () {

Route::get('department/index','index')->name('department.index');
Route::get('department/create','create')->name('department.create');
Route::post('department/search','search')->name('department.search');
Route::post('department/store','store')->name('department.store');

});

Route::controller(employeeController::class)->group(function () {

Route::get('employee/index','index')->name('employee.index');
Route::get('employee/create','create')->name('employee.create');
Route::post('employee','store')->name('employee.store');
Route::get('employeeedit/{id}','edit')->name('employee.edit');
Route::put('employeeupdate/{id}','update')->name('employee.update');
Route::delete('employeedelete/{id}','destroy')->name('employee.destroy');

});

Route::controller(DesignationController::class)->group(function () {

Route::get('designation/index','index')->name('designation.index');
Route::get('designation/create','create')->name('designation.create');
Route::post('designation/store','store')->name('designation.store');
});

Route::controller(ReportController::class)->group(function () {

Route::get('report/index','index')->name('report.index');
Route::get('report/create','create')->name('report.create');
Route::post('report/searchbyproject','searchbyproject')->name('report.searchbyproject');
});