@extends('layout/app')
@section('titel','clinic index')
@section('content')
    <div class="container">
        <h1>Clinics</h1>
        <a href="{{ route('clinic.create') }}" class="btn btn-primary mb-3">Add New Clinic</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @foreach ($clinics as $clinic)
        <div class="flex justify-center card-header ">
            <h2> بيانات {{ $clinic->clinic_name}}</h2>
        </div>
        <div class="flex justify-center card-body">
            <div >
                <p> <strong>رقم تلفون العيادة: </strong>{{ $clinic->clinic_phone }}</p>
                <p> <strong>مجال اختصاص العيادة: </strong>{{ $clinic->clinic_specialty }}</p>
                <p> <strong>اسم ملف شعار العيادة: </strong>{{ $clinic->image }}</p>
                <p> <strong>الموقع الجغرافي للعيادة: </strong>{{ $clinic->location }}</p>
                <img src="{{ $clinic->image }}" alt="{{ $clinic->clinic_name }}" width="200">
                <p>
                    <a href="{{ route('clinic.edit', $clinic->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('clinic.show', $clinic->id) }}" class="btn btn-primary">show</a>
                    <form action="{{ route('clinic.destroy', $clinic->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this clinic?')">Delete</button>
                    </form>
                </p>
            </div>
        </div>
        @endforeach
<!--         <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Specialty</th>
                    <th>Image</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clinics as $clinic)
                    <tr>
                        <td>{{ $clinic->id }}</td>
                        <td>{{ $clinic->clinic_name }}</td>
                        <td>{{ $clinic->clinic_phone }}</td>
                        <td>{{ $clinic->clinic_specialty }}</td>
                        <td><img src="{{ $clinic->image }}" alt="{{ $clinic->clinic_name }}" width="100"></td>
                        <td>{{ $clinic->location }}</td>
                        <td>
                        <a href="{{ route('clinic.edit', $clinic->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('clinic.show', $clinic->id) }}" class="btn btn-primary">show</a>
                            <form action="{{ route('clinic.destroy', $clinic->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this clinic?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
 -->    </div>
@endsection