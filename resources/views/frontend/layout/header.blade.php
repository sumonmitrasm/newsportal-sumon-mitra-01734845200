<header class="header-three">
				<div class="header-fixed-three header-fixed">
					<nav class="navbar navbar-expand-lg header-nav-three scroll-sticky">
						<div class="container">
							<div class="navbar-header">
								<a id="mobile_btn" href="javascript:void(0);">
									<span class="bar-icon">
										<span></span>
										<span></span>
										<span></span>
									</span>
								</a>
								<a href="{{url('/')}}" class="navbar-brand logo">
									<!-- <img src="{{ asset('frontend/img/logo/netcode.PNG') }}" class="img-fluid" alt="Logo"> -->
									Olivine Limited
								</a>
							</div>
							<div class="main-menu-wrapper">
								<div class="menu-header">
									<a href="{{url('/')}}" class="menu-logo">
										<!-- <img src="{{ asset('frontend/img/logo/netcode.PNG') }}" class="img-fluid" alt="Logo"> -->
										 Olivine Limited
									</a>
									<a id="menu_close" class="menu-close" href="javascript:void(0);">
										<i class="fas fa-times"></i>
									</a>
								</div>
								<ul class="main-nav">
									<li class="has-submenu active">
										<a href="{{url('/')}}">News</a>
										<!-- <ul class="submenu">
											<li><a href="index.html">Home</a></li>
											<li><a href="index-two.html">Home Two</a></li>
											<li class="active"><a href="index-three.html">Home Three</a></li>
											<li><a href="index-four.html">Home Four</a></li>
										</ul> -->
									</li>
									<li class="login-link">
										<a href="{{ route('login-customer') }}">Login / Signup</a>
									</li>
								</ul>		 
							</div>
                     @if(Auth::check())		 
							<ul class="nav header-navbar-rht align-items-center">
								<li class="nav-item">
									<a class="nav-link signin-three-head" href="{{ route('customer-logout') }}">Logout</a>
								</li>
								<li class="nav-item">
									<a class="nav-link signin-three-head" href="{{ route('customer-account') }}">Account</a>
								</li>
							</ul>
								
							
                     @else
                     <ul class="nav header-navbar-rht align-items-center">
								<li class="nav-item"> 
									<a class="nav-link login-three-head button" href="{{ route('login-customer') }}"><span>Login</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link signin-three-head" href="{{ route('register-customer') }}">Register</a>
								</li>
							</ul>
                     @endif
						</div>
					</nav>
				</div>
			</header>