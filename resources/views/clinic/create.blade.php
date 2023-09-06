@extends('layout/app')
@section('titel','create')
@section('content')
<div id="floating-window" class="container">
        <div class="row justify-content-center ">
        <h3>إضافة عيادة جديدة</h3>
        <form action="{{ route('clinic.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="clinic_name">اسم العيادة:</label>
                <input type="text" class="form-control" id="clinic_name" name="clinic_name" required>
            </div>
            <div class="form-group">
                <label for="clinic_phone">رقم الهاتف الخاص بالعيادة:</label>
                <input type="text" class="form-control" id="clinic_phone" name="clinic_phone" required>
            </div>
            <div class="form-group">
                <label for="clinic_specialty">مجال اختصاص العيادة :</label>
                <input type="text" class="form-control" id="clinic_specialty" name="clinic_specialty" required>
            </div>
            <div class="form-group">
                <label for="image">صورة بالترويسة الخاصة بالعيادة:</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="location">عنوان العيادة :</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group row mb-0 p-2">
            <button type="submit" class="btn btn-primary">حفظ بيانات العيادة</button>
            <a href="{{ route('verifyUser') }}" class="btn btn-secondary">
                        {{ __('إلغاء') }}
            </a>
            </div>
        </form>
    </div>
</div>
@endsection
