<!DOCTYPE html>
<html lang="en">

<head>
	<title>ISSD工作管理平台-使用者建立</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--網頁icon===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('assets/login/login/images/icons/favicon.ico')}}" />
	<!--bootstrap樣式===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--網頁圖標===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('assets/login/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/login/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{asset('assets/login/login/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/login/vendor/select2/select2.min.css')}}">
	<!--網頁下方樣式===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/login/css/util.css')}}">
	{{-- 修改過 main CSS檔案名稱 --}}
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/login/css/main_create.css')}}">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('assets/login/login/images/img-01.png')}}" alt="IMG">
				</div>
				@foreach ($edit as $data)
				<form method="POST" action="{{ route('user.update',['id'=>$data->id]) }}" class="login100-form validate-form">
					<span class="login100-form-title">
						<div>ISSD工作管理平台</div>
						<div>User Edit</div>
					</span>
					@csrf
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz"
						style="margin-top: -20px">
						<input class="input100" type="text" name="userid" placeholder="UserID" disabled=""
							value="{{ $data->userid }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password_new" placeholder="Password" required />
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="text" name="username" placeholder="UserName" disabled=""
							value="{{ $data->username }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="text" name="phone" placeholder="Phone" disabled="" value="{{ $data->phone }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="email" name="email" placeholder="Email" disabled=""
							value="{{ $data->email }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						{{-- <input class="input100" type="text" name="role_new" placeholder="Position" value="{{ $data->position }}">
						--}}
						<select class="input100" type="text" name="role_new">
							@foreach ($lists as $data)
							<option value="{{ $data->id }}">{{ $data->type }}</option>
							@endforeach
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Edit
						</button>
						<button class="login100-form-btn" type="reset">
							reset
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							{{-- 無法登入請聯絡管理人員。 --}}
						</span>
						<a class="txt2" href="{{ route('user.list') }}">
							Back
						</a>
					</div>

					{{-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create_User
							<!--小箭頭圖示-->
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
						<a class="txt2" href="#">
							Edit_User
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> --}}
					@endforeach
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="{{asset('assets/login/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/login/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/login/vendor/select2/select2.min.js')}}"></script>
	<!--圖片波動===============================================================================================-->
	<script src="{{asset('assets/login/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/js/main.js')}}"></script>

</body>

</html>
