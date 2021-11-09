<!DOCTYPE html>
<html lang="en">

<head>
	<title>ISSD工作管理平台-Login</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/login/css/main.css')}}">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('assets/login/login/images/img-01.png')}}" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="POST" action="{{ route('login.auth') }}">
					@csrf
					<span class="login100-form-title">
						<div>ISSD工作管理平台-Login</div>
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="userid" placeholder="UserID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							無法登入請聯絡管理人員。
						</span>
					</div>

					<div class="text-center p-t-100">
						{{-- <a class="txt2" href="{{ route('usercreate') }}"> --}}
						{{-- 使用者建立 --}}
						{{-- 小箭頭圖示 --}}
						{{-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> --}}
						{{-- </a> --}}
						{{-- <a class="txt2" href="{{ route('userlist') }}"> --}}
						{{-- 使用者清單(刪除/修改) --}}
						{{-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> --}}
						</a>
					</div>
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
