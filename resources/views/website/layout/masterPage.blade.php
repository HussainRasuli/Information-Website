<!DOCTYPE html>
    <html lang="en">
    <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mawoud Educational Center</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="Keywords" content="Mawoud Educational Center, Mawoud, Donation">
    <meta name="Description" content="Mawoud Educational center">

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/meanmenu.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/fontawesome-all.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/flaticon.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/magnific-popup.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/animate.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/select2.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/owl.carousel.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/style.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/responsive.css')}}" />
 
    </head>
    <body>

    <div id="loading">
    <div id="loading-center">
    <div id="loading-center-absolute">
    <div class="object" id="object_one"></div>
    <div class="object" id="object_two"></div>
    <div class="object" id="object_three"></div>
    <div class="object" id="object_four"></div>
    </div>
    </div>
    </div>


    <div class="navbar-area">
    <div class="mobile-nav">
    <a href="{{ route('/') }}" class="logo">
       <img src="{{asset('public/website/assets/images/logo3.png')}}" alt="logo" style="height: 41px;"/>
       <span style="color:black;text-transform: capitalize;font-size: 14px;">Mawoud Educational Center</span>
    </a>
    </div>
    <div class="main-nav">
    <div class="container">
    <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="{{ route('/') }}">
      <img src="{{asset('public/website/assets/images/mawoud_logo.png')}}" alt="logo"/>
    </a>
    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
    <ul class="navbar-nav text-right">

    <li class="nav-item {{ Request::is('/') || Request::is('') ? 'active' : '' }}">
    <a href="{{ route('/') }}" class="nav-link">Home</a>
    </li>

    <li class="nav-item {{ Request::is('about_page') || Request::is('') ? 'active' : '' }}">
    <a href="{{route('about_page')}}" class="nav-link">About</a>
    </li>

    <li class="nav-item {{ Request::is('our_activity') || Request::is('') ? 'active' : '' }}">
    <a href="{{route('our_activity')}}" class="nav-link">Our Activities</a>
    </li>

    <li class="nav-item {{ Request::is('our_teachers') || Request::is('') ? 'active' : '' }}">
    <a href="{{route('our_teachers')}}" class="nav-link">Teachers</a>
    </li>

    <li class="nav-item {{ Request::is('contact_us') || Request::is('') ? 'active' : '' }}">
    <a href="{{route('contact_us')}}" class="nav-link">Contact </a>
    </li>
    </ul>
    </div>
    </nav>
    </div>
    </div>
    </div>


     @yield('content')


    <div class="copy-area">
    <div class="container">
    <div class="col-lg-12">
    <div class="row">
    <div class="copy">
    <p>
    &copy; 2022 All Rights Reserved to Mawoud Educational Center
    </p>
    <p>Website Developed by Hussain Rasuli</p>
    </div>
    </div>
    </div>
    </div>
    </div>

    <a href="#" class="scroll-top wow bounceInDown">
    <i class="fas fa-angle-double-up"></i>
    </a>
 
    <script data-cfasync="false" src="{{asset('public/website/assets/js/email-decode.min.js')}}">

    </script><script src="{{asset('public/website/assets/js/jquery.min.js')}}"></script>

    </script><script src="{{asset('public/website/assets/js/select2.full.min.js')}}"></script>
    </script><script src="{{asset('public/website/assets/js/form-select2.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/jquery.meanmenu.js')}}"></script>

    <script src="{{asset('public/website/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/wow.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/isotope.pkgd.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/form-validator.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/contact-form-script.js')}}"></script>

    <script src="{{asset('public/website/assets/js/main.js')}}"></script>

    @yield('website_script')

    </body>
    </html>