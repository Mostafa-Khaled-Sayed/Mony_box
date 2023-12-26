
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("web/login/vendor/bootstrap/css/bootstrap.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("web/login/vendor/animate/animate.css")}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset("web/login/vendor/css-hamburgers/hamburgers.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("web/login/vendor/select2/select2.min.css")}}">
<!--===============================================================================================-->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
	<link rel="stylesheet" type="text/css" href="{{asset("web/login/css/util.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("web/login/css/main.css")}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset("web/login/images/img-01.png")}}" alt="IMG">
				</div>
                    @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
				<form class="login100-form validate-form"  method="POST" action="{{ route('register') }}">
					 @csrf
                    <span class="login100-form-title">
						Member Register
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Name is required" >
						<input class="input100" type="text"  name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" required minlength="6" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  minlength="6"   name="password_confirmation" required autocomplete="new-password"  placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "code invention is required">
						<input class="input100" type="text"   name="code_invention"  autocomplete="new-password"  placeholder="code_invention">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					 <div class="wrap-input100 validate-input" data-validate = " Number Phone is required">
						<input class="input100 phonekey"  type="tel"   name="phone"    placeholder="Number Phone" id="phonekey">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>

					

					<div class="text-center pt-2">
						<a class="txt2" href="{{url('/login')}}">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->	
	<script src="{{asset("web/login/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("web/login/vendor/bootstrap/js/popper.js")}}"></script>
	<script src="{{asset("web/login/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("web/login/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
	<script src="{{asset("web/login/vendor/tilt/tilt.jquery.min.js")}}"></script>
	 <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
		   const input = document.querySelector("#phonekey");
    window.intlTelInput(input, {
      utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>