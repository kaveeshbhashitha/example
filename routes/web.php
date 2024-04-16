<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'index'])->name('index');
Route::post('/create', [StudentController::class, 'create'])->name('create');
Route::get('/{id}/delete', [StudentController::class, 'delete'])->name('delete');
Route::get('/{id}/update', [StudentController::class, 'update'])->name('update');
Route::post('/{id}/edit', [StudentController::class, 'edit'])->name('useredit');

Route::controller(StudentController::class)->group(function (){
    Route::get('/create', 'create');
    Route::post('/SaveStudent', 'save') -> name('student.save');
});

Route::resource('/employee', EmployeeController::class);

Route::post('/employees/{id}/publish', [EmployeeController::class, 'publish'])->name('employee.publish');
Route::post('/employees/{id}/unpublish', [EmployeeController::class, 'unpublish'])->name('employee.unpublish');

