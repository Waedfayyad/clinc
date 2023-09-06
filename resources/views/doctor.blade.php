@extends('layout/app')
@section('titel','Doctor')
@section('content')
<div class="container-fluid blur p-5 text-center" style="width: 26rem;">
	<div class="card ">
		<div class="card-header " style="background-color:#f7cac9;">
	<h3>	مرحبا بك دكتور </h3>
	<h5>	{{ Auth::user()->user_full_name }} </h5>
		</div>
		<div class="card-body">
			إدارة الموقع تتمنى لك يوم عمل جيد ونتشرف بوضع ثقتك بنا 
		</div>
	</div>
</div>
@endsection('content')			
