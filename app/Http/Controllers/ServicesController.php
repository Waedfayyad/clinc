<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('services.index', ['services' => $services]);
    }

    public function create($data)
    {
        return view('services.create',['id' =>$data]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $service = new Services();
        $service->clinic_informations_id = $user->clinic_id;
        $service->patient_id =  $request->input('patient_id');
        $service->service_date =  $request->input('service_date');
        $service->service_time =  $request->input('service_time');
        $service->service_duration =  $request->input('service_duration');
        $service->served = "0";
        $service->save();


        return redirect('search/getTodayCustomers')->with('success', 'Service created successfully!');
    }

    public function show(Services $service)
    {
        return view('services.show', ['service' => $service]);
    }

    public function edit(Services $service)
    {
        $user = Auth::user();
        $userType = $user->user_type;
        if ($userType == '1') {
            return view('services.editD', ['service' => $service]);
           
        } elseif ($userType == '2') {
            return view('services.edit', ['service' => $service]);
        }
        
    }

    public function update(Request $request, Services $service)
    {
        $user = Auth::user();
        $userType = $user->user_type;
        if ($userType == '1') {
            $service->patient_symptoms = $request->input('patient_symptoms');
            $service->patient_diagnosis = $request->input('patient_diagnosis');
            $service->patient_checkups = $request->input('patient_checkups');
            $service->patient_prescription = $request->input('patient_prescription');
            $service->service_cost = $request->input('service_cost');
            $service->served = request('served') ? true : false;
            $service->save();
               
        } elseif ($userType == '2') {
            $service->service_date = $request->input('service_date');
            $service->service_time = $request->input('service_time');
            $service->service_duration = $request->input('service_duration');
            $service->service_cost = $request->input('service_cost');
            $service->save();
        }


        return redirect('search/getTodayCustomers')->with('success', 'Service updated successfully!');
    }

    public function destroy(Services $service)
    {
        $service->delete();

        return redirect('search/getTodayCustomers')->with('success', 'Service deleted successfully!');
    }

   
}
