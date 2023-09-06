@extends('layout/app')
@section('titel','todat customer')
@section('content')
<div >
<!-- Sidebar content goes here -->
<ul >
@guest
<a href="{{ route('login') }}" class="btn btn-primary"> برجاء تسجيل الدخول</a>
@else
@foreach ($users as $user)
   
    <h5 id="Li1" style=" text-align: center;">كشف حساب خاص بالزبون : {{ $user->user_full_name }} </h5>    
    @foreach ($clinics as $clinic)
        <p> <strong>اسم العيادة: </strong>{{ $clinic->clinic_name }}</p>
    @endforeach        
        <p> <strong>رقم المستخدم: </strong>{{ $user->id }}</p>
        <p> <strong>رقم جوال المستخدم:</strong>{{ $user->user_mobile }}</p>
        <p> <strong>تاريخ الميلاد: </strong>{{ $user->user_birth_date }}</p>
        <p> <strong>إجمالي تكاليف الخدمات المقدمة:</strong>{{ $totalCosts }}</p>
        <p> <strong>إجمالي الدفعات النقدية:</strong>{{ $totalPayments }}</p>
        <p> <strong>المبلغ المتبقي:</strong>{{ $totalCosts-$totalPayments }}</p>
@endforeach

<p> كشف بتكاليف الخدمات </p>
================================================================================
@foreach ($costs as $cost)
    <li >  {{ $cost->service_date}} {{ $cost->service_cost}}</li>
@endforeach
<p> كشف بالدفعات النقدية </p>
================================================================================
@foreach ($payments as $payment)
    <li >  {{ $payment->payment_date}} {{ $payment->cash_payment_amount}}</li>
@endforeach

@endguest
<h6 style=" text-align: center;"> نهاية القائمة</h3>
</ul>
</div>
@endsection

