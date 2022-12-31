<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class User_Profile_Controller extends Controller
{
    public function index()
    {
        $data['title'] = 'Student | Profile';

        $data['user'] = User::where('name',  session('name'))->first();

        return view('user.profile', $data);
    }
    public function photo_update(Request $request)
    {
       
            if ($file = $request['image']) {

                $path = public_path() . '/uploads/profile/';
                $newName = $file->getClientOriginalName();
                $file->move($path, $newName);
                $query = User::where('user_id', session('id'))->update(['photo' => $newName]);

                if ($query) {
                    $data = [
                        'success' => true,
                        'message' => "Successfully Updated!",
                        'path' => $newName
                    ];
                    //success
                    echo json_encode($data);
                } else {
                    //query failed
                    echo 3;
                }
            } 
    }
}
