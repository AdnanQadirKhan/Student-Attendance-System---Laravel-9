<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\User;

class Admin_Dashboard_Controller extends Controller
{
    public function index()
    {
        if (session('type') == 'admin' && session('isLoggedIn') == true) {
            $data['title'] = 'Admin | Dashboard';
            $data['user'] = User::where('user_id',  session('id'))->first();
            $data['students'] = User::all()->count();
            $data['attendances'] = Attendance::all()->where('status', 'Present')->count();
            $data['absents'] = Attendance::all()->where('status', 'Absent')->count();
            $data['leaves'] = Attendance::all()->where('status', 'Leave')->count();
            return view('admin.dashboard', $data);
        } else {
            return redirect('/');
        }
    }
}
