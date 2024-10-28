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

		<!-- Slick CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick-theme.css') }}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/plugins/select2/css/select2.min.css') }}">

		<!-- Swiper CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/plugins/swiper/css/swiper.min.css') }}">
		
		<!-- Aos CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/plugins/aos/aos.css') }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
		<!--token verify for ajex -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	
	</head>
	<body class="home-three">
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			@include('frontend.layout.header')
			<!-- /Header -->
			
			@yield('content')
			
			<!-- Footer -->
			@include('frontend.layout.footer')
			<!-- /Footer -->
		   
		</div>
	   <!-- /Main Wrapper -->

	  
		<!-- jQuery -->
		<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>	
		
		<!-- Owl Carousel JS -->
		<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
		
		<!-- Aos -->
		<script src="{{ asset('frontend/plugins/aos/aos.js') }}"></script>
		
		<!-- counterup JS -->
		<script src="{{ asset('frontend/js/jquery.waypoints.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
		
		<!-- Select2 JS -->
		<script src="{{ asset('frontend/plugins/select2/js/select2.min.js') }}"></script>	

		<!-- Slick Slider -->
		<script src="{{ asset('frontend/plugins/slick/slick.js') }}"></script>

		<!-- Swiper Slider -->
		<script src="{{ asset('frontend/plugins/swiper/js/swiper.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('frontend/js/script.js') }}"></script>
		
	</body>
</html>