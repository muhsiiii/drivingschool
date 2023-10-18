<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function empLogin()
    {
        return view('admin.employee.emp_login');
    }

    public function EmployeedoLogin(Request $request)
    {
        $input = ['name' => $request->username, 'password' => $request->password];

        if (auth()->guard('employee')->attempt($input)) {

            $data['success']='success';

        } else {
            $data['error']='error';

        }
        echo json_encode($data);
    }
}
