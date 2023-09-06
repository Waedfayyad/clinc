@extends('layout/app')
@section('titel','todat customer')
@section('content')
<div >
    <h4 id="Li1" style=" text-align: center;"> قائمة الحجوزات لهذا اليوم</h4>    
    <p>====================================================================================</p>
    @guest
    <a href="{{ route('login') }}" class="btn btn-primary"> برجاء تسجيل الدخول</a>
    @else

    قائمة المرضي في الإنتظار  
    <table class="table">
        <thead>
            <tr>
                <th>رقم الخدمة</th>
                <th>الإسم</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($TodayCustomersServedNot as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->user_name}}</td>
                <td>
                    <a href="{{ route('services.edit', $user->id) }}" class="btn btn-primary"> خدمة الزبون </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    قائمة المرضى الذين تم خدمتهم
    <table class="table">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الإسم</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($TodayCustomersServed as $user1)
            <tr>
                <td>{{ $user1->patient_id }}</td>
                <td>{{ $user1->user_name}}</td>
                <td>
                    <a href="{{ route('payments.create',   $user1->patient_id) }}" class="btn btn-primary">إضافة دفعة </a>
                    <a href="{{ route('search.customerMony', $user1->patient_id) }}" class="btn btn-primary"> كشف حساب للمستخدم </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @endguest
    <p>====================================================================================</p>
    <h6 style=" text-align: center;"> نهاية القائمة</h6>
</div>
@endsection

