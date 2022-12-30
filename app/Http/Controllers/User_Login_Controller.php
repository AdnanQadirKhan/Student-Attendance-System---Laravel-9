<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User_Model;

class User_Login_Controller extends Controller
{
    public function index()
    {
        $data['title'] = 'Student | Login';
        return view('user.auth.signin', $data);
    }
    public function login(Request $request)
    {

        $user = new User_Model();
        //validation rules
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        if ($validated) {
            $verifyEmail = $user->where('email', $request['email'])->first();
            if ($verifyEmail) {
                $verifyPassword = password_verify($request['password'], $verifyEmail['password']);
                if ($verifyPassword) {
                    $response = $this->setUserSession($verifyEmail);
                    if ($response) {
                        $data = [
                            'status' => true,
                            'message' => 'Successfully Logged In'
                        ];
                        echo json_encode($data);
                    } else {
                        $data = [
                            'status' => false,
                            'message' => 'Failed to login'
                        ];
                        echo json_encode($data);
                    }
                } else {
                    //password does not match
                    $data = [
                        'status' => false,
                        'message' => 'Incorrrect email or password'
                    ];
                    echo json_encode($data);
                }
            } else {
                //email does not match
                $data = [
                    'status' => false,
                    'message' => 'Incorrrect email or password'
                ];
                echo json_encode($data);
            }
        }
        else{
            $data = [
                'status' => false,
                'message' => 'Validation Failed'
            ];
            echo json_encode($data); 
        }
    }

    //creating session for user
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['user_id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'photo' => $user['photo'],
            'isLoggedIn' => true,

        ];
        session()->put($data);
        return true;
    }

    //user logout
    protected function logout(){
        session()->flush();
        return redirect('/login');
    }
}
