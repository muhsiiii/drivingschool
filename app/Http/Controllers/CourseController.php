<?php

namespace App\Http\Controllers;

use App\Models\Coursetype;
use Illuminate\Http\Request;

class CourseController extends Controller
{
 public function Course()
 {
    $courses=Coursetype::where('status','active')->get();
    return view('admin.course.course',compact('courses'));
 }

 public function CourseSave(Request $request)
 {
    $coursesave=Coursetype::create([
        'course'=>$request->course,
        'amount'=>$request->amount
    ]);

    if($coursesave){
        $data['success']='success';
    }else{
        $data['error']='error';
    }
    echo json_encode($data);
 }


}
