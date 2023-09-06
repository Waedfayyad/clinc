@extends('layout/app')
@section('titel','clinic show')
@section('content')
<div id="floating-window" >
        <div class="flex justify-center card-header ">
             <h5> بيانات الحالة تحت الخدمة</h5>
         </div>
        <div class=" card-body">
            <div >
            <p> <strong>رقم المستخدم: </strong>{{ $service->patient_id }}</p>
            <p> <strong>التاريخ: </strong>{{ $service->service_date }}</p>
            <p> <strong>الوقت: </strong>{{ $service->service_time }}</p>
            <p> <strong>المدة المقدرة: </strong>{{ $service->service_duration }}</p>
            <p> <strong>تكلفة الخدمة: </strong>{{ $service->service_cost }}</p>
            </div>
        </div>
    <a href="{{ route('services.edit', $service) }}">تعديل البيانات</a>
</div>

@endsection
