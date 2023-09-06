<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function index()
    {
        $payments = Payments::all();
        return view('payments.index', compact('payments'));
    }
        //

        public function create($data)
        {
            return view('payments.create', ['id' =>$data]);
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'users_id' => 'required',
                'clinic_informations_id' => 'required',
                'payment_date' => 'required',
                'cash_payment_amount' => 'required',
            ]);

            Payments::create($validatedData);
        
            return redirect()->route('search.getTodayCustomers')->with('success', 'Payment created successfully.');
        }

        public function edit($id)
        {
            $payment = Payments::findOrFail($id);
            return view('payments.edit', compact('payment'));
        }

        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'users_id' => 'required',
                'clinic_informations_id' => 'required',
                'payment_date' => 'required',
                'cash_payment_amount' => 'required',
            ]);
        
            $payment = Payments::findOrFail($id);
            $payment->update($validatedData);
        
            return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
        }
        public function destroy($id)
        {
            $payment = Payments::findOrFail($id);
            $payment->delete();
        
            return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
        }
        public function show($id)
        {
            $payment = Payments::findOrFail($id);
            return view('payments.show', compact('payment'));
        }
    }
