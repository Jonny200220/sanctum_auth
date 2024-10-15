<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('v1/departments', DepartmentController::class);
Route::resource('v1/employees', EmployeeController::class);
Route::get('v1/employeesall',[EmployeeController::class, 'all']);
Route::get('v1/employeesbydepartment',[EmployeeController::class, 'EmployeesByDepartment']);
Route::get('v1/logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('v1/login',[AuthController::class, 'login'])->middleware('auth:sanctum');
