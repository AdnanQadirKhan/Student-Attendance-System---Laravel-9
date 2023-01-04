<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Leaves;
use App\Models\User;

class Attendance_Controller extends Controller
{
    public function index()
    {
        $data['title'] = 'Student | Attendance';

        $data['user'] = User::all()->where('user_id',  session('id'))->first();
        $data['attendance'] = Attendance::all()->where('student_id', session('id'));

        return view('user.attendance')->with($data);
    }
    public function markAttendance(Request $request)
    {
        $canMark = true;
        $currentDate = date('Y-m-d');
        $student = new Attendance();
        $attendance = Attendance::where('student_id', session('id'))->get();
        foreach ($attendance as $at) {
            if ($currentDate == date('Y-m-d', strtotime($at->date))) {
                $canMark = false;
                echo 0;
                break;
            }
        }
        if ($canMark) {
            $student->status = 'Present';
            $student->date = $currentDate;
            $student->student_id = session('id');

            $query = $student->save();
            //attendance marked successfully
            if ($query) {
                echo 1;
            }
        } else {
        }
    }
    public function markLeave(Request $request)
    {
       
        $validated = $request->validate([
            'reason' => 'required|max:255',
            'fromDte' => 'required',
            'toDte' => 'required'
        ]);
        if ($validated) {
            $leave = new Leaves();
            $leave->reason = $request['reason'];
            $leave->student_id = session('id');
            $leave->from_dte = $request['fromDte'];
            $leave->to_dte = $request['toDte'];
            $query = $leave->save();
            if ($query) {    
                echo 1;
            } else {
                echo 0;
            }
        } else {
            //validation failed
            echo 3;
        }
    }
}
