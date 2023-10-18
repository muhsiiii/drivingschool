<?php

namespace App\Http\Controllers;

use App\Models\Subservice;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function Forms($id)
    {
        $subservices=Subservice::all();
        return view('admin.forms.forms',compact('subservices','id'));
    }

    public function FormsAdd($id)
    {
        return view('admin.forms.form_add',compact('id'));
    }
}
