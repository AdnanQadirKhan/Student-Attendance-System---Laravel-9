<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Registration_Controller extends Controller
{
    public function index()
    {
        $data['title'] = 'Student | Register';
        return view('auth.signup', $data);
    }
    public function register(Request $request)
    {
        //user model object 
        $user = new User();

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'cpassword' => 'required|max:255',

        ]);
        if ($validated) {
            //saving data
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = password_hash($request['password'], PASSWORD_BCRYPT);
            $user->role = 'student';
            $verifyEmail = User::where('email', $request['email'])->first();
            if (!$verifyEmail) {
                $query = $user->save();
                if ($query) {
                    $data = [
                        'status' => true,
                        'message' => 'Successfully Registered.'
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        'status' => false,
                        'message' => 'Failed to register.'
                    ];
                    echo json_encode($data);
                }
            } else {
                $data = [
                    'status' => false,
                    'message' => 'This email is already registered. Enter a unique email address.'
                ];
                echo json_encode($data);
            }
        } 
        else {
            //validation failed
            $data = [
                'status' => false,
                'message' => 'Validation failed'
            ];
            echo json_encode($data);
        }
    }
}
