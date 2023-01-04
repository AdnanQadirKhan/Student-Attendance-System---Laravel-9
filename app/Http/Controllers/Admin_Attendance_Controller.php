<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class Admin_Attendance_Controller extends Controller
{
    public function index(){
        if (session('type') == 'admin' && session('isLoggedIn') == true) {
            $data['title'] = 'Attendance | Students';
            $data['user'] = User::where('user_id',  session('id'))->first();
            $data['attendances'] = Attendance::join('users', 'users.user_id', '=', 'attendances.student_id')->select('*')->orderBy('attendances.created_at', 'asc')->get(); //joining users and attendance tables to get complete data of students
            $data['students'] = User::all()->where('role', 'student');
            return view('admin.attendances', $data);
        } else {
            return redirect('/');
        }
    }
    public function markAttendance(Request $request)
    {
        
        $canMark = true;
        $currentDate = date('Y-m-d');
        $student = new Attendance();
        $attendance = Attendance::where('student_id', $request['student'])->get();
        foreach ($attendance as $at) {
            if ($currentDate == date('Y-m-d', strtotime($at->date))) {
                $canMark = false;
                echo 0;
                break;
            }
        }
        if ($canMark) {
            $data = [
                'status' => $request['status'],
                'created_at' => $currentDate,
                'student_id' => $request['student']
            ];

            $query = $student->insert($data);
            //attendance marked successfully
            if ($query) {
                echo 1;
            }
        } else {
        }
    }
    //delete attendance function
    public function deleteAttendance($id){
        
        $query = Attendance::find($id)->delete();   //find the attendance id in database and delete it
        if($query){
            //true
            $data = [
                'status' => true,
                'message' => 'Attendance has been Deleted'
            ];
            echo json_encode($data);
        }
        else{
            //false
            $data = [
                'status' => false,
                'message' => 'Unexpected Error. Contact Admin Please!'
            ];
            echo json_encode($data);
        }

    }
    //get single student data to edit
    public function getAttendance($id){
        $attendance = Attendance::join('users', 'users.user_id', 'attendances.student_id')->where('id', $id)->first();
        if($id!=null){
            echo json_encode($attendance);
        }
        else{
            return false;
        }
       
    }
    public function editAttendance(Request $request, $id = null)
    {
        
      
        if ($id!=null) {        
            $query = Attendance::where('id', $id)->update(['status'=> $request->status, 'created_at' => $request->date, 'student_id' =>$request->student]);
            //attendance marked successfully
            if ($query) {
                echo 1;
            }
        } else {
        }
    }
}
