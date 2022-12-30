<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Model;

class User_Profile_Controller extends Controller
{
    public function index(){
        $data['title'] = 'Student | Profile';
        $user = new User_Model();

        $data['user'] = $user->where('name',  session('name'))->first();

        return view('user.profile', $data);
    }
    public function photo_update(Request $request){
        $validated = $request->validate([
            'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',

        ]);
        if (!$validated) {
            echo 2;
        } else {
            if ($file = $request['image']) {
                // if ($request->hasFile('image')) {
                    // $old_pic = session('pic');

                    $path = public_path().'/uploads/profile/';
                    // if ($old_pic != 'avatar.jpg') {
                    //     if (is_file($path . $old_pic)) {
                    //         unlink($path . $old_pic);
                    //     }
                    // }
                    $newName = $file->getClientOriginalName();
                    $file->move($path, $newName);
                    $user = new User_Model();
                    // gives UPDATE `mytable` SET `field` = 'field' WHERE `id` = ?
                    // $user->set('photo', $newName);
                    $query = $user->where('user_id', session('id'))->update(['photo'=>$newName]);
                    
                    if ($query) {
                        // session()->set('photo', $newName);
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
                // } else {
                //     //file not valid and has moved
                //     echo 4;
                // }
            } else {
                //file not get
                echo 5;
            }
        }
        
    }
}
