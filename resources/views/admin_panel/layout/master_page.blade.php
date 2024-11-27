

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mawoud Educational Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="Keywords" content="Mawoud Educational Center, Mawoud, Donation">
    <meta name="Description" content="Mawoud Educational center">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/sweetalert2.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/custom.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i>&nbsp; Search...</a>
                                <div class="search-input">
                                    <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input id="input_search" class="input" type="text" placeholder="Search" tabindex="-1" data-search="template-list">
                                    <div class="search-input-close"><i class="feather icon-x"></i></div>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <div class="bookmark-input search-input">
                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>

                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                                <span class="user-status"><i class="fa fa-circle font-small-3 text-success mr-50"></i>Online</span>
                                </div>
                                <span>
                                    @if(Auth::user()->image == 'male_user.jpg' || Auth::user()->image == '')
                                        <img class="round" src="{{asset('public/admin_panel/app-assets/images/logo/male_user.jpg')}}" alt="avatar" height="40" width="40">
                                    @else
                                        <img class="round" src="{{ url('/storage/app/users/'.Auth::user()->image) }}" alt="avatar" height="40" width="40">
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('personal_profile')}}"><i class="feather icon-user"></i> Profile</a>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header text-center">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item ">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <!-- <img src="{{asset('public/admin_panel/app-assets/images/logo/logo.png')}}" alt="" class="logo"> -->
                        Admin Panel
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ Request::is('view_slider') || Request::is('') ? 'active' : '' }}" style="margin-top:25px;">
                    <a href="{{route('view_slider')}}"><i class="fa fa-picture-o"></i><span class="menu-title" data-i18n="Todo">Slider</span></a>
                </li>   
                <li class="nav-item {{ Request::is('slogan') || Request::is('slogan_form') ? 'active' : '' }}">
                    <a href="{{route('slogan')}}"><i class="fa fa-wpforms"></i><span class="menu-title" data-i18n="Todo">Slogan</span></a>
                </li>  
                <li class="nav-item has-sub"><a href="#"><i class="fa fa-file-text-o"></i><span class="menu-title" data-i18n="Ecommerce">About</span></a>
                    <ul class="menu-content" style="">
                        <li class="{{ Request::is('about') || Request::is('about_form') || Request::is('') ? 'active' : '' }}">
                            <a href="{{route('about')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Short Information</span></a>
                        </li>
                        <li class="{{ Request::is('more_info') || Request::is('more_info_form') || Request::is('') ? 'active' : '' }}">
                            <a href="{{route('more_info')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">More Information</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('donation') || Request::is('donation_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('donation')}}"><i class="fa fa-files-o"></i><span class="menu-title" data-i18n="Todo">Donation des...</span></a>
                </li> 
                <li class="nav-item {{ Request::is('activity') || Request::is('activity_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('activity')}}"><i class="feather icon-award"></i><span class="menu-title" data-i18n="Todo">Activity</span></a>
                </li>  
                <li class="nav-item {{ Request::is('teacher') || Request::is('teacher_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('teacher')}}"><i class="fa fa-user-o"></i><span class="menu-title" data-i18n="Todo">Teachers</span></a>
                </li> 
                <li class="nav-item {{ Request::is('galary') || Request::is('galary_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('galary')}}"><i class="fa fa-file-image-o"></i><span class="menu-title" data-i18n="Todo">Galary</span></a>
                </li> 
                <li class="nav-item {{ Request::is('contact') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('contact')}}"><i class="fa fa-phone-square"></i><span class="menu-title" data-i18n="Todo">Contact</span></a>
                </li>    
                <li class="nav-item {{ Request::is('view_contact_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('contact_form')}}"><i class="fa fa-envelope-o"></i><span class="menu-title" data-i18n="Todo">Contact Form</span></a>
                </li>    
                <li class="nav-item {{ Request::is('cover_image') || Request::is('cover_image_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('cover_image')}}"><i class="fa fa-picture-o"></i><span class="menu-title" data-i18n="Todo">Cover Image</span></a>
                </li> 
            @if(Auth::user()->type == 'Admin')
                <li class="nav-item {{ Request::is('users') || Request::is('users_form') || Request::is('') ? 'active' : '' }}">
                    <a href="{{route('users')}}"><i class="fa fa-users"></i><span class="menu-title" data-i18n="Todo">Users</span></a>
                </li>    
            @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class='container pt-4' id="loader" hidden="">
      <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--text'></div>
      </div>
    </div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">&copy; <span id="year"></span> All Rights Reserved to<a class="text-bold-800 grey darken-2" href="{{route('dashboard')}}">Mawoud Educational Center</a></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->
    
    <script src="{{asset('public/admin_panel/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('public/admin_panel/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('public/admin_panel/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('public/admin_panel/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('public/admin_panel/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{asset('public/admin_panel/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{asset('public/admin_panel/app-assets/js/scripts/sweetalert2.min.js')}}"></script>


    @yield('script')

</body>
<!-- END: Body-->

</html>