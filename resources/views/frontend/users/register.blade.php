<!DOCTYPE html> 
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Olivine Limited</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.svg') }}">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.min.css') }}">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/plugins/feather/feather.css') }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper log-wrap">
		
			<div class="row">
			
				<!-- Login Banner -->
				<div class="col-md-6 login-bg">
					<div class="owl-carousel login-slide owl-theme">
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{ asset('frontend/img/login-img.png') }}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Olivine Limited</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{ asset('frontend/img/login-img.png') }}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Olivine Limited</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{ asset('frontend/img/login-img.png') }}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Olivine Limited</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Login Banner -->
				
				<div class="col-md-6 login-wrap-bg">		
				
					<!-- Login -->
					<div class="login-wrapper">
						<div class="loginbox">
							<div class="w-100">
								<div class="img-logo">
									<!-- <img src="{{ asset('frontend/img/logo.svg') }}" class="img-fluid" alt="Logo"> -->
									Olivine Limited
									<div class="back-home">
										<a href="{{url('/')}}">Back to Home</a>
									</div>
								</div>
                                @if ($errors->any())
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									@foreach ($errors->all() as $error)
									<strong>Error Message: </strong>{{ $error }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<br>
									@endforeach
								</div>
								@endif
								@if(Session::has('error_message'))
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Error Message: </strong>{{Session::get('error_message')}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endif
                                @if(Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success Message: </strong>{{Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
								<h1>Sign into Your Account</h1>
								<form id="regusterForm" action="{{ route('save-register-user') }}" method="post">@csrf
									<div class="input-block">
										<label class="form-control-label">Name</label>
										<input type="text" name="name" class="form-control" placeholder="Enter your name">
									</div>
                                    <div class="input-block">
										<label class="form-control-label">Phone Number</label>
										<input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile number">
									</div>
                                    <div class="input-block">
										<label class="form-control-label">Email</label>
										<input type="email" name="email" class="form-control" placeholder="Enter your email address">
									</div>
									<div class="input-block">
										<label class="form-control-label">Password</label>
										<div class="pass-group">
											<input type="password" name="password" class="form-control pass-input" placeholder="Enter your password">
											<span class="feather-eye toggle-password"></span>
										</div>
									</div>
									<!-- <div class="forgot">
										<span><a class="forgot-link" href="forgot-password.html">Forgot Password ?</a></span>
									</div> -->
									<!-- <div class="remember-me">
										<label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me  
											<input type="checkbox" name="radio">
											<span class="checkmark"></span>
										</label>
									</div> -->
									<div class="d-grid">
										<button class="btn btn-primary btn-start" type="submit">Sign Up</button>
									</div>
								</form>
							</div>
						</div>
						<div class="google-bg text-center">
							<p class="mb-0">New User ? <a href="{{ route('login-customer') }}">Login</a></p>
						</div>
					</div>
					<!-- /Login -->
					
				</div>
				
			</div>
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Owl Carousel -->
		<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>	
		
		<!-- Custom JS -->
		<script src="{{ asset('frontend/js/script.js') }}"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		
	</body>
</html>