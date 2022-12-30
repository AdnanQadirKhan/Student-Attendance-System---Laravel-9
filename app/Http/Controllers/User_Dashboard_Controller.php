<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Model;


class User_Dashboard_Controller extends Controller
{
    public function index(){
        $data['title'] = 'Student | Dashboard';
        $user = new User_Model();
        $data['user'] = $user->where('user_id',  session('id'))->first();
              
        return view('user.index', $data);
    }
}
