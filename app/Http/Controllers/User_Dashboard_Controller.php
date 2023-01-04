<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class User_Dashboard_Controller extends Controller
{
    public function index(){
        if(session('type') == 'student' && session('isLoggedIn') == true){
        $data['title'] = 'Student | Dashboard';
        $data['user'] = User::where('user_id',  session('id'))->first();
              
        return view('user.index', $data);
        }
        else{
            return redirect('/');
        }
    }
}
