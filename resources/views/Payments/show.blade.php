@extends('layout/app')
@section('titel','clinic show')
@section('content')
<div class="card">
    <div class="card-header">
        Payment Details
    </div>
    <div class="card-body">
        <h5 class="card-title">Payment ID: {{ $payment->id }}</h5>
        <p class="card-text">User ID: {{ $payment->users_id }}</p>
        <p class="card-text">Clinic ID: {{ $payment->clinic_informations_id }}</p>
        <p class="card-text">Payment Date: {{ $payment->payment_date }}</p>
        <p class="card-text">Cash Payment Amount: {{ $payment->cash_payment_amount }}</p>
    </div>
</div>
@endsection
