@extends('layout/app')
@section('titel','Home')
@section('content')
        <div class="form-box" style=" position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="form-value">
                <h2>مرحبا بك في موقع العيادة</h2>
                <div class="inputbox" style="  text-align: center;">
                    نتمنى أن نستطيع خدمتك إذا كنت  
                </div>
                <div class="inputbox" style="  text-align: center;">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">طبيب أو تعمل في عيادة يمكنك الضغط هنا</a>
                </div>
                <div class="inputbox" style="  text-align: center;">
                    <a href="{{ route('UnderConstruction') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">تبحث عن طبيب أو عيادة يمكنك الضغط هنا</a>
                </div>
            </div>
        </div>
@endsection('content')