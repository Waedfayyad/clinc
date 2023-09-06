@extends('layout/app')
@section('titel','Login')
@section('content')
<div class="row justify-content-center  position-fixed " style=" position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
	@if($message = Session::get('success'))
	<div class="alert alert-info text-center">
	{{ $message }}
	</div>
	@endif
	<div class="form-box">
            <div class="form-value">
				<form action="{{ route('sample.validate_login') }}" method="post">
				@csrf
                    <h2>تسجيل الدخول</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" placeholder="البريد الإلكتروني"  required>
						@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" placeholder="كلمة المرور" required>
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
                    </div>
                    <button>تسجيل الدخول</button>
                    <div class="register">
                        <a class="nav-link" href="{{ route('registration') }}">تسجيل حساب جديد</a>
                    </div>
                </form>
            </div>
        </div>

@endsection('content')