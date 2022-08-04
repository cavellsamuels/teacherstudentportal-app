<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('index');
});

//Admin
Route::get('/admin/register', [AdminAuthController::class, 'showAdminRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'adminRegister'])->name('admin.register');

Route::get('/admin/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function () 
{
    Route::get('admin/dashboard', [AdminController::class, 'showAdminDashboard'])->name('admin.dashboard');
});

//Teacher
Route::get('/teacher/register', [TeacherAuthController::class, 'showTeacherRegisterForm'])->name('teacher.register');
Route::post('/teacher/register', [TeacherAuthController::class, 'teacherRegister'])->name('teacher.register');

Route::get('/teacher/login', [TeacherAuthController::class, 'showTeacherLoginForm'])->name('teacher.login');
Route::post('/teacher/login', [TeacherAuthController::class, 'teacherLogin'])->name('teacher.login');

Route::get('/teacher/logout', [TeacherAuthController::class, 'teacherLogout'])->name('teacher.logout');

Route::group(['middleware' => ['auth:teacher']], function () 
{
    Route::get('teacher/dashboard', [TeacherController::class, 'showTeacherDashboard'])->name('teacher.dashboard');
    Route::post('teacher/dashboard', [TeacherController::class, 'upl'])->name('teacher.upload');
});

//Student
Route::get('/student/register', [StudentAuthController::class, 'showStudentRegisterForm'])->name('student.register');
Route::post('/student/register', [StudentAuthController::class, 'studentRegister'])->name('student.register');

Route::get('/student/login', [StudentAuthController::class, 'showStudentLoginForm'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class, 'studentLogin'])->name('student.login');
Route::get('/student/logout', [StudentAuthController::class, 'studentLogout'])->name('student.logout');

Route::group(['middleware' => ['auth:student']], function () 
{
    Route::get('student/dashboard', [StudentController::class, 'showStudentDashboard'])->name('student.dashboard');
});

// require __DIR__.'/auth.php';
