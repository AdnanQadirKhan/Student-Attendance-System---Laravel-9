<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration_Controller;
use App\Http\Controllers\User_Login_Controller;
use App\Http\Controllers\User_Dashboard_Controller;
use App\Http\Controllers\User_Profile_Controller;
use App\Http\Controllers\Attendance_Controller;
use App\Http\Controllers\Admin_Profile_Controller;
use App\Http\Controllers\Admin_Dashboard_Controller;
use App\Http\Controllers\Admin_Leaves_Controller;
use App\Http\Controllers\Admin_Attendance_Controller;
use App\Http\Controllers\Admin_Report_Controller;
use App\Http\Controllers\Admin_Students_Controller;
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
Route::get('/', function(){
    $data['title'] = 'Login';
    return view('auth.signin', $data);
});
// --------------- Admin Routes ---------------------------------------------
//---------------- Admin Profile Routes ---------------------------------------

Route::get('/admin/profile', [Admin_Profile_Controller::class, 'index'])->name('admin-profile');


//---------------- Admin Login Routes ---------------------------------------
Route::get('/admin/dashboard', [Admin_Dashboard_Controller::class, 'index'])->name('admin_dashboard');

//---------------- Admin Student Routes ---------------------------------------
Route::get('/admin/students', [Admin_Students_Controller::class, 'index'])->name('admin_students');

//---------------- Admin Leave Routes ---------------------------------------
Route::get('/admin/leaves', [Admin_Leaves_Controller::class, 'index'])->name('leaves');
Route::get('/admin/leave/accept/{id}', [Admin_Leaves_Controller::class, 'acceptLeave']);
Route::get('/admin/leave/delete/{id}', [Admin_Leaves_Controller::class, 'deleteLeave']);


//---------------- Admin Attendance Routes ---------------------------------------
Route::get('/admin/attendances', [Admin_Attendance_Controller::class, 'index'])->name('attendances');
Route::post('/attendance/mark', [Admin_Attendance_Controller::class,'markAttendance']);
Route::get('/admin/attendance/delete/{id}', [Admin_Attendance_Controller::class, 'deleteAttendance']);
Route::match(['GET', 'POST'],'/attendance/edit/{id}', [Admin_Attendance_Controller::class, 'editAttendance']);
Route::get('/getAttendance/{id}', [Admin_Attendance_Controller::class, 'getAttendance']);

//---------------- Admin Report Routes --------------------------------------------------------------
Route::get('admin/report', [Admin_Report_Controller::class, 'system_report_index'])->name('system-report');
Route::post('/admin/system-report/all',[Admin_Report_Controller::class, 'findAllData']);
Route::get('/admin/student-report', [Admin_Report_Controller::class,'student_report_index'])->name('student-report');
Route::match(['GET', 'POST'],'/admin/student-report/{id}', [Admin_Report_Controller::class,'findData']);

//--------------------- xxxxxxxxxxxxxxxxxxx ---------------------------------------------------------




// --------------- User Routes ---------------------------------------------

//---------------- User Login Routes ---------------------------------------
Route::get('/login', [User_Login_Controller::class, 'index']);
Route::post('/login',[User_Login_Controller::class, 'login']);
Route::get('/logout', [User_Login_Controller::class, 'logout'])->name('logout');
Route::get('/dashboard', [User_Dashboard_Controller::class, 'index'])->name('user_dashboard');
//--------------------- xxxxxxxxxxxxxxxxxxx ---------------------------------

//---------------- User Profile Routes ---------------------------------------
Route::get('/profile', [User_Profile_Controller::class, 'index'])->name('profile');
Route::post('/photo/update', [User_Profile_Controller::class, 'photo_update']);

//--------------------- xxxxxxxxxxxxxxxxxxx ---------------------------------

//---------------- User Attendance Routes -----------------------------------
Route::get('/attendance', [Attendance_Controller::class,'index']);
Route::get('/attendance/mark', [Attendance_Controller::class,'markAttendance']);
Route::post('/attendance/leave', [Attendance_Controller::class,'markLeave']);

//--------------------- xxxxxxxxxxxxxxxxxxx -----------------------------------

//---------------- Registration Routes ----------------------------------------
Route::get('/register', [Registration_Controller::class, 'index']);
Route::post('/register', [Registration_Controller::class, 'register']);
//--------------------- xxxxxxxxxxxxxxxxxxx ---------------------------------

