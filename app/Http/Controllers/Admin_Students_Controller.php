<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class Admin_Students_Controller extends Controller
{
    public function index(){
        if (session('type') == 'admin' && session('isLoggedIn') == true) {
        $data['title'] = 'Students | Admin';
        $data['user'] = User::where('user_id',  session('id'))->first();
        $data['students'] = User::all();


        return view('admin.students', $data);
    } else {
        return redirect('/');
    }
    }
}
