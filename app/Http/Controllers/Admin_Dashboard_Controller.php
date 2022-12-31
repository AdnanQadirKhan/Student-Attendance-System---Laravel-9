<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Admin_Dashboard_Controller extends Controller
{
    public function index(){
        $data['title'] = 'Admin | Dashboard';
        
        $data['user'] = User::where('user_id',  session('id'))->first();
        return view('admin.dashboard', $data);
    }
}
