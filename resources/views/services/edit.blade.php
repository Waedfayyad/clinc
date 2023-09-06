@extends('layout/app')
@section('titel','Edit Service')
@section('content')
<div id="floating-window" >
        <div class="flex justify-center card-header ">
             <h5> بيانات الحالة تحت الخدمة</h5>
         </div>
        <div class="flex justify-center card-body">
    <form action="{{ route('services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

            <div >
            <p> <strong>رقم المستخدم: </strong>        
            <input type="text" name="patient_id" value="{{ $service->patient_id }}" required></p>
            <p> <strong>التاريخ: </strong>
            <input type="date" name="service_date" value="{{ $service->service_date }}" required></p>
            <p> <strong>الوقت: </strong>
            <input type="time" name="service_time" value="{{ $service->service_time }}" required></p>
            <p> <strong>المدة المقدرة: </strong>
            <input type="text" name="service_duration" value="{{ $service->service_duration }}" required></p>
            <p> <strong>تكلفة الخدمة: </strong>
            <input type="number" name="service_cost" value="{{ $service->service_cost }}" required></p>
            </div>
        </div>

        <button type="submit">Update Service</button>
    </form>
</div>
@endsection