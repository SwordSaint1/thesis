<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentFormController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;


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
    if(Auth::check()){
        return redirect('/students');
    }else{
        return view('welcome');
    }
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\StudentController::class, 'index'])->name('home');

    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/subjects/create', 'App\Http\Controllers\SubjectController@create');
    Route::resource('subjects', SubjectController::class);

    Route::get('subject/edit', 'App\Http\Controllers\SubjectController@edit');
    Route::resource('enrollment-form', EnrollmentFormController::class);
    Route::resource('payments', PaymentController::class);
    Route::get('students/{student}/enrollment-form', 'App\Http\Controllers\EnrollmentFormController@createStudent');
    Route::get('validate-enrollment', 'App\Http\Controllers\EnrollmentFormController@validateEnrollment');
    Route::get('students-search/{student_number}', 'App\Http\Controllers\StudentController@search');

    // Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
    Route::resource('accounts', AccountController::class);
    // Route::get('accounts', 'App\Http\Controllers\AccountController@index');
    Route::get('profile', 'App\Http\Controllers\AccountController@profile');
    Route::get('settings', 'App\Http\Controllers\AccountController@settings');

    Route::get('/import-form', [StudentController::class, 'importForm']);

    Route::post('/import',[StudentController::class, 'import'])->name('student.import');
});
