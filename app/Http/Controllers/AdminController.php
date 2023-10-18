<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{
    public function Login()
    {
        return view('admin.login');
    }

    public function index()
    {
        return view('admin.home');
    }



    public function DoLogin(Request $request)
    {
        $input = ['name' => $request->username, 'password' => $request->password];

        if (auth()->attempt($input)) {

            $data['success']='success';

        } else {
            $data['error']='error';

        }
        echo json_encode($data);
    }

    public function LogOut()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

}
