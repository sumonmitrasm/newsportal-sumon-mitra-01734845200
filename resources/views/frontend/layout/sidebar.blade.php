<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<div class="sticky">
   <aside class="app-sidebar sidebar-scroll">
      <div class="main-sidebar-header active">
         <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('admin/assets/images/brand/logo.png') }}" class="main-logo" alt="logo"></a>
         <a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('admin/assets/images/brand/logo1.png') }}" class="main-logo" alt="logo"></a>
         <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('admin/assets/images/brand/favicon.png') }}" alt="logo"></a>
         <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('admin/assets/images/brand/favicon1.png') }}" alt="logo"></a>
      </div>
      <div class="main-sidemenu">
         <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
               <div class="user-pic">
                  @if(!empty(Auth::guard('admin')->user()->image))
                  <img src="{{ asset('admin/admin/large/'.Auth::guard('admin')->user()->image) }}" alt="img" class="avatar avatar-md brround">
                  @else
                  <img  src="{{ asset('admin/profile.png') }}" alt="img" class="avatar avatar-md brround">
                  @endif
               </div>
               <div class="user-info text-center">
                  <h5 class=" mb-1 font-weight-bold">{{ Auth::guard('admin')->user()->name }}</h5>
                  <span class="text-muted app-sidebar__user-name text-sm">{{ Auth::guard('admin')->user()->type }}</span>
               </div>
            </div>
         </div>
         <div class="slide-left disabled" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
               <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/>
            </svg>
         </div>
         <ul class="side-menu">
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                     <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg>
                  <span class="side-menu__label">Dashboard</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1"><a href="javascript:void(0)">Dashboard</a></li>
                  <li><a class="slide-item" href="{{url('admin/dashboard')}}"><span>Dashboard</span></a></li>
               </ul>
            </li>
            @if(Auth::guard('admin')->user()->type=="volenteer")
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                     <polyline points="2 17 12 22 22 17"></polyline>
                     <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                  <span class="side-menu__label">Apps</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Settings</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Settings</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{url('admin/update-admin-password')}}">Update admin password</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/update-admin-details')}}">Update admin details</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            @else
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                     <polyline points="2 17 12 22 22 17"></polyline>
                     <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                  <span class="side-menu__label">Apps</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Settings</a>
                  </li>
                  <li class="sub-slide">
                     <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Settings</span><i class="sub-angle fe fe-chevron-right"></i></a>
                     <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="{{url('admin/update-admin-password')}}">Update admin password</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/update-admin-details')}}">Update admin details</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/admins')}}">All User</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/admins/volunteer')}}">All Volenteer</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/contact-blade')}}">Contact</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/contact-front')}}">Contact Front</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/about-us')}}">About</a></li>
                        <li><a class="sub-slide-item" href="{{url('admin/blog-post')}}">Blog</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            <li class="slide">
               <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                     <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                     <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                  </svg>
                  <span class="side-menu__label">Forms</span><i class="angle fe fe-chevron-right"></i>
               </a>
               <ul class="slide-menu">
                  <li class="side-menu-label1">
                     <a href="javascript:void(0)">Forms</a>
                  </li>
                  <li><a href="{{ route('post') }}" class="slide-item"> Post</a></li>
               </ul>
            </li>
            @endif



           
         </ul>
         <div class="app-sidebar-help">
            <div class="dropdown text-center">
               <div class="help d-flex">
                  <a href="javascript:void(0)" class="nav-link p-0 help-dropdown" data-bs-toggle="dropdown">
                  <span class="font-weight-bold">Help Info</span> <i class="fa fa-angle-down ms-2"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-4">
                     <div class="sidebar-dropdown-divider pb-3">
                        <h4 class="font-weight-bold">Help</h4>
                        <a class="d-block" href="javascript:void(0)">Knowledge base</a>
                        <a class="d-block" href="javascript:void(0)">Contact@info.com</a>
                        <a class="d-block" href="javascript:void(0)">88 8888 8888</a>
                     </div>
                     <div class="sidebar-dropdown-divider pb-3 pt-3 mb-3">
                        <p class="mb-1">Your Fax Number</p>
                        <a class="font-weight-bold" href="javascript:void(0)">88 8888 8888</a>
                     </div>
                     <a href="login-1.html">Logout</a>
                  </div>
                  <div class="ms-auto">
                     <a class="nav-link icon p-0" href="javascript:void(0)">
                        <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                           <path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path>
                           <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path>
                        </svg>
                        <span class="pulse "></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="slide-right" id="slide-right">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
               <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/>
            </svg>
         </div>
      </div>
   </aside>
</div>