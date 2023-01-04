<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\User;

class Admin_Report_Controller extends Controller
{
    //- - - - - - - Single Student Report Functions - - - - - - 
    public function student_report_index()
    {
        if (session('type') == 'admin' && session('isLoggedIn') == true) {

            $data['title'] = 'Student Report ';
            $data['user'] = User::where('user_id',  session('id'))->first();
            $data['students'] = User::join('attendances', 'attendances.student_id', '=', 'users.user_id')->get();
            return view('admin.student_report', $data);
        } else {
            return redirect('/');
        }
    }
    public function findData(Request $request, $id = null)
    {

        $data['student'] = User::join('attendances', 'attendances.student_id', '=', 'users.user_id')->select('*')->whereDate('attendances.created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('attendances.created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('attendances.student_id', '=', $id)->get();

        $data['presents'] = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('status', '=', 'Present')->where('attendances.student_id', '=', $id)->count();

        $data['absents'] = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('status', '=', 'Absent')->where('attendances.student_id', '=', $id)->count();

        $data['leaves'] = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('status', '=', 'Leave')->where('attendances.student_id', '=', $id)->count();

        $total = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('attendances.student_id', '=', $id)->count();

        if ($total > 0) {
            $data['percentage'] = ($data['presents'] / $total) * 100;
            if ($data['student']) {
                //search found
                echo json_encode($data);
            } else {
                //data not found
                echo 0;
            }
        }
    }



    // - - - - System Report Functions - - - - - - - - - - - - - 
    public function system_report_index()
    {
        $data['title'] = 'Students Report ';
        $data['user'] = User::where('user_id',  session('id'))->first();
        $data['students'] = User::join('attendances', 'attendances.student_id', '=', 'users.user_id')->get();
        return view('admin.system_report', $data);
    }

    public function findAllData(Request $request)
    {

        $data['students'] = User::join('attendances', 'attendances.student_id', '=', 'users.user_id')
            ->select('*')
            ->whereDate('attendances.created_at', '>=', date('Y-m-d', strtotime($request->from)))
            ->whereDate('attendances.created_at', '<=', date('Y-m-d', strtotime($request->to)))->get();
        $data['presents'] = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('status', '=', 'Present')->count();
        $data['absents'] = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('status', '=', 'Absent')->count();
        $data['leaves'] = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->where('status', '=', 'Leave')->count();
        $total = Attendance::whereDate('created_at', '>=', date('Y-m-d', strtotime($request->from)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->to)))->count();
        if ($total > 0) {
            $data['percentage'] = ($data['presents'] / $total) * 100;
            if ($data['students']) {
                //search found
                echo json_encode($data);
            } else {
                //data not found
                echo 0;
            }
        }
    }
}
