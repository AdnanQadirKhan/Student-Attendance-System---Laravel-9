<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class Admin_Grade_Controller extends Controller
{
    public function index()
    {
        if (session('isLoggedIn') == true && session('type') == 'admin') {
            $data['user'] = User::where('user_id',  session('id'))->first();

            $data['title'] = 'Student Grades';
            $data['students'] = User::join('attendances', 'attendances.student_id', '=', 'users.user_id')->get();


            return view('admin.student_grade', $data);
        } else {
            return redirect('/');
        }
    }
    public function findGrade($id = null)
    {
        if ($id != null) {
            $data['student'] = User::join('attendances', 'attendances.student_id', '=', 'users.user_id')->select('users.name', 'users.created_at')->where('attendances.student_id', '=', $id)->first();
            $attendance = Attendance::where('student_id', '=', $id)->count();
            $percent = ($attendance / 20) * 100;
            switch ($percent) {
                case ($percent >= 0 && $percent <= 50):
                    $data['grade'] = 'F';
                    echo json_encode($data);
                    break;

                case ($attendance >= 55 && $attendance <= 60):
                    $data['grade'] = 'C-';
                    echo json_encode($data);
                    break;

                case ($attendance >= 60 && $attendance <= 65):
                    $data['grade'] = 'C+';
                    echo json_encode($data);
                    break;

                case ($attendance >= 70 && $attendance <= 75):
                    $data['grade'] = 'B-';
                    echo json_encode($data);
                    break;

                case ($attendance >= 75 && $attendance <= 80):
                    $data['grade'] = 'B+';
                    echo json_encode($data);
                    break;

                case ($attendance >= 80 && $attendance <= 85):
                    $data['grade'] = 'A-';
                    echo json_encode($data);
                    break;

                case ($attendance >= 85 && $attendance <= 90):
                    $data['grade'] = 'A';
                    echo json_encode($data);
                    break;

                case ($attendance >= 90 && $attendance <= 100):
                    $data['grade'] = 'A+';
                    echo json_encode($data);
                    break;
                default:
                    $data['grade'] = 'Something went wrong!';
            }
        } else {
            return redirect('/admin/student-grade/');
        }
    }
}
