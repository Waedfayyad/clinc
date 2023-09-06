<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{

    public function getTodayCustomers()
    {
        $now = Carbon::now();
        $dateFormatted = $now->format('Y-m-d');
        $user = Auth::user();
        $clinicId= $user->clinic_id;
        $TodayCustomersServed = DB::table('service_provision')
        ->join('users', 'users.id', '=', 'service_provision.patient_id')
        ->join('clinic_informations', 'clinic_informations.id', '=', 'service_provision.clinic_informations_id')
            ->select('users.user_full_name as user_name',  'service_provision.*')
            ->where('service_provision.clinic_informations_id', $clinicId)
            ->where('service_provision.service_date', $dateFormatted)
            ->where('service_provision.served','1' )
            ->get();
        $TodayCustomersServedNot = DB::table('service_provision')
            ->join('users', 'users.id', '=', 'service_provision.patient_id')
            ->join('clinic_informations', 'clinic_informations.id', '=', 'service_provision.clinic_informations_id')
                ->select('users.user_full_name as user_name',  'service_provision.*')
                ->where('service_provision.clinic_informations_id', $clinicId)
                ->where('service_provision.service_date', $dateFormatted)
                ->where('service_provision.served','0' )
                ->get();
        //  dd($TodayCustomersServedNot,$TodayCustomersServed);
            return view('search.getTodayCustomers', compact('TodayCustomersServed','TodayCustomersServedNot'));
        //eturn $TodayCustomers;
    }   
    public function getTodayMony()
    {
        $now = Carbon::now();
        $dateFormatted = $now->format('Y-m-d');
        $user = Auth::user();
        $clinicId= $user->clinic_id;
        $TodayCustomersMony = DB::table('service_provision')
        ->join('users', 'users.id', '=', 'service_provision.patient_id')
        ->join('clinic_informations', 'clinic_informations.id', '=', 'service_provision.clinic_informations_id')
            ->select('users.user_full_name as user_name',  'service_provision.*')
            ->where('service_provision.clinic_informations_id', $clinicId)
            ->where('service_provision.service_date', $dateFormatted)
            ->where('service_provision.served','1' )
            ->get();
        //  dd($TodayCustomersServedNot,$TodayCustomersServed);
            return view('search.getTodayMony', compact('TodayCustomersMony'));
        //eturn $TodayCustomers;
    }   
    public function getTodayPayments()
    {
        $now = Carbon::now();
        $dateFormatted = $now->format('Y-m-d');
        $user = Auth::user();
        $clinicId= $user->clinic_id;
        $TodayPayments = DB::table('cash_payments')
        ->join('users', 'users.id', '=', 'cash_payments.users_id')
        ->join('clinic_informations', 'clinic_informations.id', '=', 'cash_payments.clinic_informations_id')
            ->select('users.user_full_name as user_name',  'cash_payments.*')
            ->where('cash_payments.clinic_informations_id', $clinicId)
            ->where('cash_payments.payment_date', $dateFormatted)
            ->get();
        //  dd($TodayCustomersServedNot,$TodayCustomersServed);
            return view('search.getTodayPayments', compact('TodayPayments'));
        //eturn $TodayCustomers;
    }   


    public function customerMony($id)
    {
        $user = Auth::user();
        $clinicId= $user->clinic_id;
        $users = DB::table('users')
            ->where('id', $id)
            ->get();
        $clinics = DB::table('clinic_informations')
            ->where('id', $clinicId)
            ->get();

        $payments = DB::table('cash_payments')
            ->where('users_id', $id)
            ->where('clinic_informations_id', $clinicId)
            ->get();

        $totalPayments = $payments->sum('cash_payment_amount');

        $costs = DB::table('service_provision')
            ->where('patient_id', $id)
            ->where('clinic_informations_id', $clinicId)
            ->get();

        $totalCosts = $costs->sum('service_cost');

       // dd($totalPayments,$totalCosts,$payments,$costs,$user,$clinic);

        return view('search.customerMony', compact('totalPayments','totalCosts','payments','costs','users','clinics'));
    } 

    public function searchByUserNameForClinic(Request $request)
    {
        $user = Auth::user();
        $clinicId=$user->clinic_id;
        $userName = $request->input('user_name');
        $services = DB::table('users')
        ->where('users.user_full_name', 'like', '%'.$userName.'%')
        ->get();

        if(count($services) > 0) {
            return view('search.index', compact('services'));
        } else {
            return view('users.create')->with('success', 'يبدو أنه لا يوجدمستخدم يحمل هذا الاسم يمكنك اضافته هنا .');
        }    
    
    }

    public function searchForClinicEmployee()
    {
        $user = Auth::user();
        $clinicId=$user->clinic_id;
        $users  = DB::table('users')
        ->join('clinic_informations', 'clinic_informations.id', '=', 'users.clinic_id')
        ->select('users.user_full_name as user_name', 'clinic_informations.clinic_name as clinic_name', 'users.*')
        ->where('users.clinic_id', $clinicId)
        ->get();

        if(count($users ) > 0) {
            return view('users.index', compact('users'));
        } else {
            return view('users.create')->with('success', 'يبدو أنه لا يوجدمستخدم يحمل هذا الاسم يمكنك اضافته هنا .');;
        }    
    }


/*----------------------------------------------------------------------------------------------------------*/
public function searchByUserNameForClinic1(Request $request)
{
    $user = Auth::user();
    $clinicId=$user->clinic_id;
    $userName = $request->input('user_name');
    $services = DB::table('service_provision')
    ->join('users', 'users.id', '=', 'service_provision.patient_id')
    ->join('clinic_informations', 'clinic_informations.id', '=', 'service_provision.clinic_informations_id')
    ->select('users.user_full_name as user_name', 'clinic_informations.clinic_name as clinic_name', 'service_provision.*')
    ->where('users.user_full_name', 'like', '%'.$userName.'%')
    ->where('clinic_informations.id', $clinicId)
    ->get();

    if(count($services) > 0) {
        return view('search.index', compact('services'));
    } else {
        return view('users.create')->with('success', 'يبدو أنه لا يوجدمستخدم يحمل هذا الاسم يمكنك اضافته هنا .');
    }    

}
public function search(Request $request)
    {  
     /*     return view('/search/index');
      */$userName = $request->input('user_name');
        $clinicId = Auth::id();
        $services = DB::table('service_provision')
                    ->join('users', 'users.id', '=', 'service_provision.patient_id')
                    ->join('clinic_informations', 'clinic_informations.id', '=', 'service_provision.clinic_informations_id')
                    ->select('users.user_full_name as user_name', 'clinic_informations.clinic_name as clinic_name', 'service_provision.*')
                    ->where('users.user_full_name', 'like', '%'.$userName.'%')
                    ->where('clinic_informations.id', $clinicId)
                    ->get();
   /* dd($services);
       */ if(count($services) > 0) {
            return view('services.search', compact('services', 'userName', 'clinicId'));
        } else {
            return view('services.create');
        }
    }
    public function search1(Request $request)
    {  
     /*     return view('/search/index');
      */$userName = $request->input('user_name');
        $clinicName = $request->input('clinic_name');
    
        $services = DB::table('service_provision')
                    ->join('users', 'users.id', '=', 'service_provision.patient_id')
                    ->join('clinic_informations', 'clinic_informations.id', '=', 'service_provision.clinic_informations_id')
                    ->select('users.user_full_name as user_name', 'clinic_informations.clinic_name as clinic_name', 'service_provision.*')
                    ->where('users.user_full_name', 'like', '%'.$userName.'%')
                    ->where('clinic_informations.clinic_name', 'like', '%'.$clinicName.'%')
                    ->get();
   /* dd($services);
     */   if(count($services) > 0) {
            return view('search.search', compact('services', 'userName', 'clinicName'));
        } else {
            return view('search.notfound');
        }
    }

    public function getServicesForCustomer($patientId,$clinicId)
    {
        $ServicesForCustomer = DB::table('service_provision')
            ->where('clinic_informations_id', $clinicId)
            ->where('patient_id', $patientId)
            ->get()
            ->toArray();
    
        return $ServicesForCustomer;
    }   

    public function searchByUserName($userName)
    {
        $services = DB::table('service_provision')
            ->join('users', 'service_provision.patient_id', '=', 'users.id')
            ->select('service_provision.*')
            ->where('users.name', 'like', "%$userName%")
            ->get();
    
        return $services;
    }
    
    public function searchByUserNameInClinicCustomer($userName,$clinicId)
    {/* البحث عن مريض معين باستخدام الإسم ويكون من زبائن العيادة  */
        $services = DB::table('service_provision')
            ->join('clinic_informations', 'service_provision.clinic_informations_id', '=', 'clinic_informations.id')
            ->join('users', 'service_provision.patient_id', '=', 'users.id')
            ->select('service_provision.*')
            ->where('users.user_full_name', 'like', "%$userName%")
            ->where('clinic_informations.id', "$clinicId")
            ->get();
           /* return view('services.search', ['services' => $services]);
           */
          return $services;
     
    }
    public function getCustomerId($customerName)
    {
        $users = DB::table('users')
            ->where('user_full_name', 'like', "%$customerName%")
            ->get()
            ->toArray();
/*                    ->first(); */
    
        if ($users) {
            return view('users.index', compact('users'));
        } else {
            return 'Customer not found';
        }
    }    

}
