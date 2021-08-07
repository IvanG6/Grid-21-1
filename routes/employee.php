<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


// prefix: /employees
// name: employees.

Route::resource('employees', EmployeeController::class);
