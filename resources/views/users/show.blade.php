@extends('layout/app')
@section('titel','Show Employee Data')
@section('content')
<div id="floating-window" >
        <div class="flex justify-center card-header ">
             <h5> بيانات {{ $user->user_full_name }}</h5>
         </div>
        <div class="flex justify-center card-body">
            <div >
                <p> <strong>رقم المستخدم: </strong>{{ $user->id }}</p>
                <p> <strong>رقم العيادة: </strong>{{ $user->clinic_id }}</p>
                <p> <strong>رقم جوال المستخدم:</strong>{{ $user->user_mobile }}</p>
                <p> <strong>تاريخ الميلاد: </strong>{{ $user->user_birth_date }}</p>
                <p> <strong>التخصص: </strong>{{ $user->user_specialty }}</p>
                <p> <strong>نوع مستخدم الموقع: </strong>{{ $user->user_type }}</p>
                <p> <strong>الجنس:</strong>{{ $user->user_gender }}</p>
            </div>
        </div>
</div>
@endsection
