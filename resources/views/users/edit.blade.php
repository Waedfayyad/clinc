@extends('layout/app')
@section('titel','Edit')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8" id ="floating-window">
    <div class="flex justify-center ">
        <h5>شكرا لك لتسجيلك في الموقع ونود منك اكمال البيانات التالية </h5>
    </div>
    <div class="flex justify-center ">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">{{ $user->user_full_name }}</label>
            <input type="hidden" name="user_full_name" value="{{ $user->user_full_name }}">
            <br>
            <label for="user_mobile">رقم الجوال</label>
            <input type="text" name="user_mobile" value="{{ $user->user_mobile }}">
            <br>
            <label for="user_specialty">مجال اختصاصك</label>
            <input type="text" name="user_specialty" value="{{ $user->user_specialty }}">
            <br>
            <label for="user_birth_date">تاريخ ميلادك</label>
            <input type="text" name="user_birth_date" value="{{ $user->user_birth_date }}">
            <br>
            <label for="user_gender">الجنس</label>
            <input type="text" name="user_gender" value="{{ $user->user_gender }}">
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
       </form>
    </div>
</div>
@endsection
