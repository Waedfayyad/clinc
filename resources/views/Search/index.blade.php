@extends('layout/app')
@section('titel','Services Search')
@section('content')
<div id="floating-window" class="container">
    <form action="{{ route('search.searchByUserNameForClinic') }}" method="GET">
        <div class="form-group">
            <label for="user_name">بحث بواسطة الإسم أو أي جزء منه</label>
            <input type="text" name="user_name" id="user_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">بحث</button>
    </form>

    @if(count($services) > 0)
        <h2>نتيجة البحث</h2>
    <table class="table">
        <thead>
            <tr>
                <th> الرقم </th>
                <th>الاسم </th>
                <th>رقم الجوال </th>
                <th>البريد الإلكتروني</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->user_full_name }}</td>
                <td>{{ $service->user_mobile }}</td>
                <td>{{ $service->email }}</td>
                <td>
                    <a href="{{ route('services.create',  ['id' => $service->id]) }}" class="btn btn-primary">حجز موعد</a>
                    <a href="{{ route('payments.create',  ['id' => $service->id]) }}" class="btn btn-primary">إضافة دفعة </a>
                    <a href="{{ route('search.customerMony',  ['id' => $service->id]) }}" class="btn btn-primary">كشف حساب  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>لا توجد نتائج</p>
@endif
</div>


@endsection