<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    public function EmployeeListActive()
    {
        $Activeemployees=Employee::where('status','active')->get();
        return view('admin.employee.active_index',compact('Activeemployees'));
    }

    public function EmployeeListBlocked()
    {
        $Blockedemployees=Employee::where('status','blocked')->get();
        return view('admin.employee.blocked_index',compact('Blockedemployees'));
    }

    public function EmployeeAdd()
    {
        return view('admin.employee.add');
    }


    public function EmployeeSave(Request $request)
    {
        $employeesave=Employee::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'password'=>bcrypt($request->password),
            'username'=>$request->username,
        ]);

        if($employeesave){
            $data['success']='success';
        }else{
            $data['error']='error';
        }

        echo json_encode($data);


    }

    public function EmployeeBlock(Request $request)
    {

        $Block=Employee::where('id',$request->eid)->update([
            'status'=>'blocked'
        ]);
        if($Block){
            $data['success']='success';
        }else{
            $data['error']='error';
        }
        echo json_encode($data);

    }

    public function EmployeeActivate(Request $request)
    {

        $Block=Employee::where('id',$request->eid)->update([
            'status'=>'active'
        ]);
        if($Block){
            $data['success']='success';
        }else{
            $data['error']='error';
        }
        echo json_encode($data);

    }

    public function empindex()
    {
        return view('admin.employee.home');
    }

    public function empLogOut()
    {
        auth()->guard('employee')->logout();
        return redirect()->route('emp.login');
    }


    public function StudentListActive()
    {
        $activestudents=Student::where('status','active')->get();
        return view('admin.students.active_students',compact('activestudents'));
    }


    public function StudentListBlocked()
    {
        $blockedstudents=Student::where('status','blocked')->get();
        return view('admin.students.blocked_students',compact('blockedstudents'));
    }

    public function StudentAdd()
    {
        return view('admin.students.add');

    }

    public function StudentSave(Request $request)
    {

        $image1=$request->image;
        $FileName="students/".time().'_'.$image1->getClientOriginalName();
        $image1->move(public_path('students'),$FileName);


        $studentsave=Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'photo'=>$FileName,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
        ]);

        if($studentsave){
            $data['success']='success';
        }else{
            $data['error']='error';
        }
        echo json_encode($data);

    }

    public function StudentEdit($id)
    {
       $student=Student::where('id',$id)->where('status','active')->first();
        return view('admin.students.edit',compact('student'));
    }


    public function StudentBlock(Request $request)
    {

        $studentBlock=Student::where('id',$request->sid)->update([
            'status'=>'blocked'
        ]);
        if($studentBlock){
            $data['success']='success';
        }else{
            $data['error']='error';
        }
        echo json_encode($data);

    }

    public function StudentActivate(Request $request)
    {

        $studentactivate=Student::where('id',$request->sid)->update([
            'status'=>'active'
        ]);
        if($studentactivate){
            $data['success']='success';
        }else{
            $data['error']='error';
        }
        echo json_encode($data);

    }

}
