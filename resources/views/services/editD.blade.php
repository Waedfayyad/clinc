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
                <p> <strong>تكلفة الخدمة: </strong>
                <input type="number" name="service_cost" value="{{ $service->service_cost }}" required></p>
                </div>
        </div>
        <label for="patient_symptoms">Symptoms:</label>
        <textarea name="patient_symptoms" required>{{ $service->patient_symptoms }}</textarea>

        <label for="patient_diagnosis">Diagnosis:</label>
        <textarea name="patient_diagnosis" required>{{ $service->patient_diagnosis }}</textarea>

        <label for="patient_checkups">Checkups:</label>
        <textarea name="patient_checkups" required>{{ $service->patient_checkups }}</textarea>

        <label for="patient_prescription">Prescription:</label>
        <textarea name="patient_prescription" required>{{ $service->patient_prescription }}</textarea>
        <div class="col-md-6">
            <label for="patient_prescription">إختر ان تم خدمة المريض:</label>
            <input 
                id="served" 
                type="checkbox" 
                class="form-check-input @error('served') is-invalid @enderror" 
                name="served" 
                {{ $service->served == 1 ? 'checked' : '' }}
            /> 
                @error('served')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <button type="submit">Update Service</button>
    </form>
</div>
@endsection