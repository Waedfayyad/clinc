@extends('layout/app')
@section('titel','clinic index')
@section('content')
@foreach($payments as $payment)
    <tr>
        <td>{{ $payment->id }}</td>
        <td>{{ $payment->users_id }}</td>
        <td>{{ $payment->clinic_informations_id }}</td>
        <td>{{ $payment->payment_date }}</td>
        <td>{{ $payment->cash_payment_amount }}</td>
        <td>
            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
@endsection