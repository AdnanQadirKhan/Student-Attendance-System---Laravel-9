<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class User_Login_Controller extends Controller
{
    public function index()
    {
        $data['title'] = 'Student | Login';
        return view('auth.signin', $data);
    }
    public function login(Request $request)
    {

        //validation rules
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validated) {
            $verifyEmail = User::where('email', $request['email'])->first();
            if ($verifyEmail) {
                $verifyPassword = password_verify($request['password'], $verifyEmail['password']);
                if ($verifyPassword) {
                    $response = $this->setUserSession($verifyEmail);
                    if($verifyEmail->role == 'student'){
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
                    }}
                    else if($verifyEmail->role == 'admin'){
                        if ($response) {
                            //successfully loggedin as an admin
                            $data = [
                            'status' => 'admin',
                            'message' => 'Successfully Logged In'
                        ];
                        echo json_encode($data);

                        } else {
                            //failed to login as an admin
                            echo 0;
                        }      
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
            'type' => $user['role'],
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
