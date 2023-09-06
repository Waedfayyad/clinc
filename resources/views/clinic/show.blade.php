@extends('layout/app')
@section('titel','clinic show')
@section('content')
<div id="floating-window" >
        <div class="flex justify-center card-header ">
            <h2> بيانات {{ $clinic->clinic_name}}</h2>
        </div>
        <div class="flex justify-center card-body">
            <div >
                <p> <strong>رقم تلفون العيادة: </strong>{{ $clinic->clinic_phone }}</p>
                <p> <strong>مجال اختصاص العيادة: </strong>{{ $clinic->clinic_specialty }}</p>
                <!-- <p> <strong>اسم ملف شعار العيادة: </strong>{{ $clinic->image }}</p> -->
                <p> <strong>الموقع الجغرافي للعيادة: </strong>{{ $clinic->location }}</p>
                <img src="{{ $clinic->image }}" alt="{{ $clinic->clinic_name }}" width="200">
                <div class="form-group row mb-0 p-2">
                    <a href="{{ route('clinic.edit', $clinic->id) }}" class="btn btn-primary">تعديل بيانات العيادة</a>
<!--                     <a href="{{ route('clinic.show', $clinic->id) }}" class="btn btn-primary">show</a>
                    <form action="{{ route('clinic.destroy', $clinic->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this clinic?')">Delete</button>
                    </form>
 -->                  
                </div>
            </div>
        </div>
</div> 
@endsection
