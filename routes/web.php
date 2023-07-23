<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterController::class,'register'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

    });
    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });
// Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/', [LoginController::class, 'login'])->name('login.submit');
// Route::post('/', [LoginController::class, 'store']);
Route::get('/', function(){
    return view('add_teacher');
});
Route::get('/allteacherlist', function(){
    return view('teacher_list');
});

Route::get('/allteacherlist',[TeacherController::class,'index']);
Route::get('/teachers/{id}/students', [TeacherController::class, 'show']);
Route::post('/',[TeacherController::class,'store'])->name('addteacher');
Route::get('/delete_teacher/{id}',[TeacherController::class,'destroy']);
Route::get('/edit_teacher/{id}',[TeacherController::class,'edit']);
Route::post('/update_teacher/{id}',[TeacherController::class,'update']);
Route::get('/teachers/{teacherId}', [TeacherController::class, 'show'])->name('teacher.students');

Route::get('/editstudents/{studentId}', [StudentController::class, 'selectededit'])->name('students.edit');


Route::post('/students/{studentId}', [StudentController::class, 'selectedupdate'])->name('students.update');
Route::get('/students/{Id}', [StudentController::class, 'selecteddestroy'])->name('student.delete');

Route::get('/addstudent', function(){
    return view('add_student');
});
Route::get('/studentlist', function(){
    return view('student_list');
});
Route::get('/studentlist',[StudentController::class,'show']);
Route::post('/addstudent',[StudentController::class,'store'])->name('addstudent');
Route::get('/delete_student/{id}',[StudentController::class,'destroy']);
Route::get('/edit_student/{id}',[StudentController::class,'edit']);
Route::post('/update_student/{id}',[StudentController::class,'update']);
Route::get('/dropdown',[StudentController::class,'dropdown']);