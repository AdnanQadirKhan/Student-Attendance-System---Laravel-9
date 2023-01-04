<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaves;

class Admin_Leaves_Controller extends Controller
{
    public function index()
    {
        if (session('type') == 'admin' && session('isLoggedIn') == true) {
            $data['title'] = 'Leaves | Students';
            $data['user'] = User::where('user_id',  session('id'))->first();
            $data['leaves'] = Leaves::join('users', 'users.user_id', '=', 'leaves.student_id')->select('*')->get(); //joining users and leaves tables to get complete data of students
            return view('admin.leaves', $data);
        } else {
            return redirect('/');
        }
    }
    //accept leave function
    public function acceptLeave(Request $request, $id)
    {
        $leaves = Leaves::find($id); //matches the priamry key of the table with the passed parameter to find
                                     //all the data of that particular row
        $leaves->status = 'approved';
        $leaves->save();
        $start_Date = date('Y-m-d', strtotime($leaves->from_dte));
        $end_Date = date('Y-m-d', strtotime($leaves->to_dte));
        //condition to check if the leave status is approved then true otherwise false
        if ($leaves->status == 'approved') {
            while ($start_Date <= $end_Date) { //loop to iterate till the condition is false
                $attendances = Attendance::where('student_id', $leaves->student_id)->get();
                $canMark = true;
                //check in the loop if the attendance of the student is Absent then mark it as leave
                //otherwise don't mark it
                foreach ($attendances as $attendance) {
                    if ($start_Date == date('Y-m-d', strtotime($attendance->created_at))) { //check if the student is absent on that day 
                        if ($attendance->status == 'Absent') {
                            $attendance->status = 'Leave';
                            $attendance->save();
                            echo 1; //Leave Marked 
                        }
                        $canMark = false;
                        break;
                    } else {
                        $canMark = true;
                    }
                }
                //if the status of canMark is 'true' then it means add new entry in the Attendance table for 
                // a new leave
                if ($canMark) {
                    $at = new Attendance();
                    $at->status = 'Leave';
                    $at->created_at = $start_Date;
                    $at->student_id = $leaves->student_id;
                    $at->save(); 
                }
                $start_Date = date('Y-m-d', strtotime($start_Date . '+1 day'));
            } //while loop end
        } else {
         //if the attendance was not approved and marked Leave then mark it as Absent

            while ($start_Date <= $end_Date) { //loop to iterate till the condition is false
                $canMark = true;
                $attendances = Attendance::where('student_id', $leaves->student_id)->get();
                foreach ($attendances as $attendance) {
                    if ($start_Date == date('Y-m-d', strtotime($attendance->created_at))) {
                        if ($attendance->status == 'Leave') { 
                            $attendance->status = 'Absent';
                            $attendance->save();
                            echo 3;
                        }

                        break;
                    }
                }
                $start_Date = date('Y-m-d', strtotime($start_Date . '+1 day'));
            } //while loop end
        }
        
    }
    //delete leave function
    public function deleteLeave($id)
    {

        $query = Leaves::find($id)->delete();   //find the leave id in database and delete it
        if ($query) {
            //true
            $data = [
                'status' => true,
                'message' => 'Leave has been Rejected'
            ];
            echo json_encode($data);
        } else {
            //false
            $data = [
                'status' => false,
                'message' => 'Unexpected Error. Contact Admin Please!'
            ];
            echo json_encode($data);
        }
    }
}
