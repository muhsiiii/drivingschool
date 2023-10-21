<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function Studentattendance()
    {
        $activestudents = Student::where('status', 'active')->get();
        return view('admin.students.attendance.attendance', compact('activestudents'));
    }

    public function StudentattendanceSave(Request $request)
    {

        $requestData = json_decode($request->getContent(), true);


        $selectedStudents = $requestData['selected_students'];
        $employee = $requestData['employee'];
        $date = $requestData['date'];


        $allStudents = Student::where('status', 'active')->get();


        foreach ($allStudents as $student) {
            $attendanceStatus = in_array($student->id, $selectedStudents) ? 'present' : 'absent';

            $action = Attendance::updateOrCreate(
                ['stud_id' => $student->id, 'date' => $date],
                ['status' => $attendanceStatus, 'added_by' => $employee]
            );
        }

        $data = [];
        if ($action) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        return response()->json($data);
    }

    public function StudentHistory()
    {
        // $activestudents = Student::where('status', 'active')->get();
        return view('admin.students.attendance.history');
    }

    public function Gethistory(Request $request)
    {
        $date = $request->date;

        // print_r($Pid);
        // die;

        $output = '';

        $Blogs = Attendance::where('date',$date)->get();
        if (sizeof($Blogs)) {
            foreach ($Blogs as $C) {

                $output .= '

                <td class="name-col">'.$loop->iteration.'</td>

                <td class="name-col">'.$C->Gethistory->name.'</td>
                <td class="attend-col" align="center"><input type="checkbox"
                        class="student-checkbox" name="status_" class="student-checkbox"
                        data-id="">
                </td>
                      ';
            }
        } else {
            $output .= '

    <h5  style="display:table;margin-left: auto !important;margin-right:auto !important;font-weight:600;font-size:22px;">No History Found</h5>

            ';
        }
        echo $output;
    }
}
