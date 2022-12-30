<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration_Controller;
use App\Http\Controllers\User_Login_Controller;
use App\Http\Controllers\User_Dashboard_Controller;
use App\Http\Controllers\User_Profile_Controller;

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
    return view('user.auth.signin', $data);
});

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


//---------------- Registration Routes --------------------------------------
Route::get('/register', [Registration_Controller::class, 'index']);
Route::post('/register', [Registration_Controller::class, 'register']);
