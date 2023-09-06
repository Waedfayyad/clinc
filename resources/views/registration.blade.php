@extends('layout/app')
@section('titel','Registration')
@section('content')
<div class="row justify-content-center" style=" position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
	<div class="form-box">
			<form action="{{ route('sample.validate_registration') }}" method="POST">
				@csrf
				<h2> تسجيل حساب جديد </h2>
				<div class="form-group mb-3">
					<input type="text" name="user_full_name" class="form-control" placeholder="الإسم ثلاثي" />
					@if($errors->has('user_full_name'))
						<span class="text-danger">{{ $errors->first('user_full_name') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="البريد الإلكتروني" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="كلمة المرور" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<select class="form-select" id="user_type" name="user_type" required>
						<option value="">اختر أحد الخيارات</option>
						<option value="1">طبيب</option>
						<option value="2">إداري</option>
						<option value="3">مريض</option>
					</select>
					@if($errors->has('user_type'))
						<span class="text-danger">{{ $errors->first('user_type') }}</span>
					@endif
				</div>
				
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-dark btn-block">تسجيل</button>
				</div>
			</form>
	</div>
</div>

@endsection('content')