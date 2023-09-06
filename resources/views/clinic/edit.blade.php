@extends('layout/app')
@section('titel','edit')

@section('content')
<div class="container " id ="floating-window">
        <h1>Edit Clinic Information</h1>
        @if(isset($clinic))
        <form method="POST" action="{{ route('clinic.update', $clinic->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="clinic_phone">Clinic Phone</label>
                <input type="text" class="form-control" id="clinic_phone" name="clinic_phone" value="{{ old('clinic_phone', $clinic->clinic_phone) }}">
            </div>
            <div class="form-group">
                <label for="clinic_name">Clinic Name</label>
                <input type="text" class="form-control" id="clinic_name" name="clinic_name" value="{{ old('clinic_name', $clinic->clinic_name) }}">
            </div>
            <div class="form-group">
                <label for="clinic_specialty">Clinic Specialty</label>
                <input type="text" class="form-control" id="clinic_specialty" name="clinic_specialty" value="{{ old('clinic_specialty', $clinic->clinic_specialty) }}">
            </div>
            <div class="form-group">
                <label for="image">Clinic Image:</label>
                <td><img src="{{ $clinic->image }}" alt="{{ $clinic->image }}" width="100"></td>
                <!-- <input type="file" class="form-control" id="updatedimage" name="updatedimage"  required> -->
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $clinic->location) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endif        
    </div>
@endsection