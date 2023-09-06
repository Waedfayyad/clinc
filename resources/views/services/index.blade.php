@extends('layout/app')
@section('titel','Services')
@section('content')
    <div class="container">
        <h3>قائمة الخدمات المقدمة</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>الساعة</th>
                    <th>مدة الخدمة</th>
                    <th>رقم المريض</th>
                    <th>التكلفة</th>
                    <th>تم خدمة الزبون</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->service_date }}</td>
                        <td>{{ $service->service_time }}</td>
                        <td>{{ $service->service_duration }}</td>
                        <td>{{ $service->patient_id }}</td>
                        <td>{{ $service->service_cost }}</td>
                        <td>{{ $service->served ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('services.create',$service->clinic_informations_id) }}" class="btn btn-success">Add Service</a>
    </div>
@endsection