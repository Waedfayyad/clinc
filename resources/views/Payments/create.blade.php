@extends('layout/app')
@section('titel','create')
@section('content')
@php
    $now = \Carbon\Carbon::now();
    $date = $now->format('Y-m-d');
    $time = $now->format('H:i:s');
@endphp
<div id="floating-window" class="container">
    <div class="row justify-content-center ">
        <h4 class="row justify-content-center ">إضافة دفعة نقدية</h3>

        <form action="{{ route('payments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="users_id">رقم المريض</label>
        <input type="text" class="form-control @error('users_id') is-invalid @enderror" id="users_id" name="users_id" value="{{ $id }}">
        @error('users_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="clinic_informations_id">رقم العيادة</label>
        <input type="text" class="form-control @error('clinic_informations_id') is-invalid @enderror" id="clinic_informations_id" name="clinic_informations_id" value="{{  auth()->user()->clinic_id  }}">
        @error('clinic_informations_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="payment_date">تاريخ الدفعة</label>
        <input type="date" class="form-control @error('payment_date') is-invalid @enderror" id="payment_date" name="payment_date" value="{{ $date }}">
        @error('payment_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="cash_payment_amount">قيمة الدفعة النقدية</label>
        <input type="number" class="form-control @error('cash_payment_amount') is-invalid @enderror" id="cash_payment_amount" name="cash_payment_amount" value="0">
        @error('cash_payment_amount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
</form>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</div>
</div>
@endsection
