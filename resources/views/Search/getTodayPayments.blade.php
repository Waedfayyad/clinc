@extends('layout/app')
@section('titel','todat customer')
@section('content')
<div >
    <h4 id="Li1" style=" text-align: center;"> قائمة تحصيلات لهذا اليوم</h4>    
    <p>====================================================================================</p>
    @guest
    <a href="{{ route('login') }}" class="btn btn-primary"> برجاء تسجيل الدخول</a>
    @else

    <table class="table">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الإسم</th>
                <th>المبلغ</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($TodayPayments as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->user_name}}</td>
                <td>{{ $user->cash_payment_amount}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @endguest
    <p>====================================================================================</p>
    <h6 style=" text-align: center;"> نهاية القائمة</h6>
</div>
@endsection

