<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Subservice;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function Services()
    {
        $services=Service::where('status','active')->get();
        return view('admin.services',compact('services'));
    }

    public function ServicesSave(Request $request)
    {
        $servicesave=Service::create([
            'service' => $request->service
        ]);

        if($servicesave){
            $data['success']='success';
        }else{
            $data['error']='error';
        }

        echo json_encode($data);
    }

    public function subServices()
    {
        $subservices=Subservice::all();
        return view('admin.sub_service',compact('subservices'));

    }

    public function subServicesadd()
    {
        $services=Service::where('status','active')->get();
        return view('admin.sub_service_add',compact('services'));

    }


    public function subServicesSave(Request $request)
    {
        $subservicesave=Subservice::create([
            'service_id'=>$request->service,
            'service_name'=>$request->subser_name,
            'amount'=>$request->amount
        ]);

        if($subservicesave){
            $data['success']='success';
        }else{
            $data['error']='error';
        }

        echo json_encode($data);


    }
}
