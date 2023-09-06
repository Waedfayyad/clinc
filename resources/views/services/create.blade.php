@extends('layout/app')
@section('titel','create Service')
@section('content')
@php
    $now = \Carbon\Carbon::now();
    $date = $now->format('Y-m-d');
    $time = $now->format('H:i:s');
@endphp
<div id="floating-window" class="container">
    <div class="row justify-content-center ">
        <h4 class="row justify-content-center ">حجز موعد جديد</h3>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="form-group row">
        <input type="text" style="visibility: hidden;" name="clinic_informations_id"  value="{{ auth()->user()->clinic_id }}" >
        </div>

        <div class="form-group row">
        <label for="patient_id">رقم المريض:</label>
        <input type="text" name="patient_id" value="{{ $id }}" required>
        </div>

        <div class="form-group row">
        <label for="service_date">التاريخ:</label>
        <input type="text" name="service_date" value=" {{ $date }}" required>
        </div>

        <div class="form-group row">
        <label for="service_time">الساعة:</label>
        <input type="text" name="service_time" value="{{ $time }}" required>
        </div>

        <div class="form-group row">
        <label for="service_duration">المدة المقدرة للخدمة:</label>
        <input type="text" name="service_duration" value="15" required>
        </div>


        <div class="form-group row mb-0 p-2">
        <button type="submit">حفظ الحجز</button>
        </div>
    </form>
<!--********************************************************************************************
<input id="user_type" type="text" style="visibility: hidden;" name="user_type" value="4" required autocomplete="user_type">

<div class="form-group row">
                <label for="user_full_name" class="col-md-4 col-form-label text-md-right">{{ __('الإسم بالكامل') }}</label>
                <div class="col-md-6">
                    <input id="user_full_name" type="text" class="form-control @error('user_full_name') is-invalid @enderror" name="user_full_name" value="{{ old('user_full_name') }}" required autocomplete="user_full_name" autofocus>
                    @error('user_full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الإلكتروني') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_mobile" class="col-md-4 col-form-label text-md-right">{{ __('رقم الجوال') }}</label>
                <div class="col-md-6">
                    <input id="user_mobile" type="text" class="form-control @error('user_mobile') is-invalid @enderror" name="user_mobile" value="{{ old('user_mobile') }}" required autocomplete="user_mobile">
                    @error('user_mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_birth_date" class="col-md-4 col-form-label text-md-right">{{ __('تاريخ الميلاد') }}</label>
                <div class="col-md-6">
                    <input id="user_birth_date" type="date" class="form-control @error('user_birth_date') is-invalid @enderror" name="user_birth_date" value="{{ old('user_birth_date') }}" required autocomplete="user_birth_date">
                    @error('user_birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_gender" class="col-md-4 col-form-label text-md-right">{{ __('الجنس') }}</label>
                <div class="col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_gender" id="user_gender_male" value="male" {{ old('user_gender') == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="user_gender_male">{{ __('ذكر') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_gender" id="user_gender_female" value="female" {{ old('user_gender') == 'female' ? 'checked' : '' }} required>{{ __('أنثى') }}  </label>
                    </div>              
                    @error('user_gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0 p-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('حفظ البيانات') }}
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        {{ __('إلغاء') }}
                    </a>
            </div>
            </form> -->
        </div>
    </div>

@endsection
