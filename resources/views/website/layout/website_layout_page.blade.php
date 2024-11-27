<!DOCTYPE html>
    <html lang="en">

    <head>
        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mawoud Educational Center</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="Keywords" content="Mawoud Educational Center, Mawoud, Donation, مرکز آموزشی موعود, موعود,">
    <meta name="Description" content="Mawoud Educational center">

    <link rel="icon" type="image/png" href="{{asset('public/website/assets/images/logo3.png')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('public/website/assets/css/meanmenu.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/fontawesome-all.min.css')}}" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/flaticon.css')}}" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/material-icon/materialdesignicons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/magnific-popup.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('public/website/assets/css/animate.css')}}" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('admin_panel/app-assets/css/components.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/owl.carousel.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/style.css')}}" />

    <link rel="stylesheet" href="{{asset('public/website/assets/css/custom.css')}}" />

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

    <li class="nav-item">
    <a href="index.html" class="nav-link active">Home</a>
    </li>

    <li class="nav-item">
    <a href="{{route('about_page')}}" class="nav-link">About</a>
    </li>

    <li class="nav-item">
    <a href="{{route('our_activity')}}" class="nav-link">Our Activities</a>
    </li>

    <li class="nav-item">
    <a href="{{route('our_teachers')}}" class="nav-link">Teachers</a>
    </li>

    <li class="nav-item">
    <a href="{{route('contact_us')}}" class="nav-link">Contact </a>
    </li>
    
    </ul>
    </div>
    </nav>
    </div>
    </div>
    </div>

    <section class="slider-area">
    <div class="home-slider owl-carousel owl-theme owl-loaded">

    

@foreach($slider as $images)
    <div class="single-slider" style="background: url('{{ asset('storage/app/slider/'.$images->slider_image) }}');">
    <div class="d-table">
    <div class="d-table-cell">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-12 text-center">
    <div class="slider-tittle one">

    <h1 style="color: #ffffff;backdrop-filter: brightness(0.5);">
    {{$images->slider_title}}
    </h1>
    <p style="color: yellow;">
    {{$images->slider_des}}
    </p>

    </div>
    <div class="slider-btn bnt1 text-center">
    <a href="{{route('contact_us')}}" class="border-btn" style="color: #ffffff;background: #83c64b;">Donate Now</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endforeach

    </div>
    </section>


    <section class="service-area"> 
    <div class="container">

    @if($all_slogan->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
        </div>
    </div>
    @endif 

    <div class="row">
@foreach($all_slogan as $slogan)
    <div class="col-lg-4 col-sm-12">
    <div class="single-service text-center">
   
    <div class="service-content">
    <h2>{{$slogan->slogan_title}}</h2>
    
        <p>{{$slogan->slogan_des}}</p>
   
    </div>
    </div>
    </div>
@endforeach
    </div>
    </div>
    </section>

    <div class="shape-ellips">
    <img src="{{asset('public/website/assets/images/shape.png')}}" alt="shape" />
    </div>
 
    <section class="choose-area" style="padding-bottom: 112px;">
    <div class="container-fluid">
    <div class="row align-items-center">

    <div class="col-lg-6 ps-0">
    <div class="table-responsive">
    @foreach($info as $video)
        <video height="300" controls style="width:100%">  
            <source src="{{ asset('/storage/app/about/'.$video->info_video) }}" type="video/mp4">
        </video>
    @endforeach
    </div>
    </div>

    <div class="col-lg-6 home-choose">
    <div class="home-choose-content">

    @if($info->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
        </div>
    </div>
    @endif 

    <div class="section-tittle">
    @foreach($info as $title)
    <h2>{{$title->info_title}}</h2>
    <p>{{$title->info_des}}</p>
    </div>
    @endforeach 
    <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12">
    <ul class="choose-list-left">
    @foreach($info_item as $item)
    <li><i class="flaticon-check-mark"></i>{{$item->item_name}}</li>
    @endforeach
    </ul>
    </div>
    <div class="col-md-12 col-12">
    <a href="{{route('about_page')}}" class="box-btn know_btn">Read More</a>
    </div>
   
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
<br><br>

    <section class="home-ragular-course pb-100">
        <div class="container">
    @if($donation_des->isEmpty())
        <div class="col-12 mt-1 mb-1">
            <div class="alert alert-warning">
                <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
            </div>
        </div>
    @else
    @foreach($donation_des as $donation)
        <div class="section-tittle text-center">
        <h2>{{$donation->donation_title}}</h2>
        <p style="margin: auto 15%; text-align:left;line-height: 2rem;">
         {{$donation->donation_des}}
        </p>
    @endforeach 
    @endif
<a href="{{route('contact_us')}}" class="border-btn" style="color: #ffffff;background: #83c64b;">Donate Now</a>
        </div>
        </div>
        </section>

<section class="home-special-course" style="padding: 50px 0;">
    <div class="container-fluid">
    <div class="section-tittle text-center">
    <h2>Our Activity</h2>
    </div>
    <div class="home-course-slider owl-carousel owl-theme">
    
 @foreach($activity as $activity_cover)
    <div class="single-home-special-course">
    <div class="course-img">
    <img src="{{ asset('storage/app/activity_image/'.$activity_cover->activity_image) }}" alt="course" />
    <div class="course-content">
    <h2>{{$activity_cover->activity_title}}</h2>
    <a href="{{route('activity_details'). '/' . $activity_cover->activity_id }}" class="box-btn activity_cover_btn" id="{{$activity_cover->activity_id}}">View</a>
    </div>
    </div>
    </div>
@endforeach
    </div>
    </div>
</section>

    <section class="home-teachers-area" style="padding-bottom: 3rem;">
    <div class="container">
    <div class="section-tittle text-center">
    <h2 style="margin-top:50px;">Our Teachers</h2>
    </div>
    <div class="row">
  @if($all_teacher->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
        </div>
    </div>
  @else
 @foreach($all_teacher as $teachers)
    <div class="col-lg-3 col-sm-6">
    <div class="single-home-teacher">
    <div class="">
    <a href="{{route('teachers'). '/' . $teachers->teacher_id }}">
    <img  src="{{ url('/storage/app/teacher/'.$teachers->teacher_image) }}" alt="teacher" /></a>
    </div>
    <div class="teachers-content">
    <h2>{{$teachers->teacher_name}} {{$teachers->teacher_lastname}}</h2>
    <p>{{$teachers->position}}</p>
    </div>
    </div>
    </div>
 @endforeach
  @endif
    </div>
    </div>
    </section>

    <section class="gallery-area" style="background: #cfe7ba80">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h2 style="text-align: center;">Gallery</h2>
    <ul class="all-gall">
    <li class="active" data-filter="*" style="cursor:pointer;"><span style="color:black;">All</span></li>
    <li data-filter=".Students" style="cursor:pointer;"><span style="color:black;">Students</span></li>
    <li data-filter=".Teachers" style="cursor:pointer;"><span style="color:black;">Teachers</span></li>
    <li data-filter=".Staff" style="cursor:pointer;"><span style="color:black;">Staff</span></li>
    <li data-filter=".Donations" style="cursor:pointer;"><span style="color:black;">Donations</span></li>
    <li data-filter=".Others" style="cursor:pointer;"><span style="color:black;">Others</span></li>
    </ul>
    </div>
    </div>
    @if($galary->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
        </div>
    </div>
    @endif
    
    <div class="row gall-list mb-0 wrapper">
    @foreach($galary as $galary_image)
    <div class="col-lg-4 col-md-6 item items {{$galary_image->category_name}}">
    <div class="single-gall">
    <div class="gall-img">
    <a href="{{ url('/storage/app/galary/'.$galary_image->galary_image) }}" class="image-pop">
    <img src="{{ url('/storage/app/galary/'.$galary_image->galary_image) }}" alt="gallery" />
    </a>
    </div>
    <div class="gall-content ">
    <h3>{{$galary_image->title}}</h3>
    </div>
    </div>
    </div>
    @endforeach
    </div>

    <div class="row">
@if(! $galary->isEmpty())
    <div class="col-lg-12 text-center">
    <div class="col-md-12 col-sm-12 content_div mt-2" id="current_staff_pagination">
    <div class="card" style="background: #e4f0d9;">
        <div class="card-content">
            <div class="card-body" style="padding-bottom:8px;">
                    <div id="pagination-container"></div>
            </div>
        </div>
    </div>
  </div>
@endif

    </div>
    </div>
    </section>

    <div class="footer-area">
    <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-6">
    <div class="footer-left">
    <a href="{{ route('/') }}" class="logo" style="font-size: 23px;color: #000000;font-weight: bold;">Mawoud Educational Center</a>
    @foreach($info as $title)
         <p style="color: #000;">{{$title->info_des}}</p>
    @endforeach 
    <ul class="footer-social">
    @foreach($all_links as $key => $value)

    @if($key == 'facebook')
        <li>
        <a href="{{$value}}" target="_blank" title="Facebook"><i class="mdi mdi-facebook"></i></a>
        </li>
    @endif
    @if($key == 'twitter')
        <li>
        <a href="{{$value}}" target="_blank" title="Twitter"><i class="mdi mdi-twitter"></i></a>
        </li>
    @endif
    @if($key == 'whatsapp')
        <li>
        <a href="{{$value}}" target="_blank" title="WhatsApp"><i class="mdi mdi-whatsapp"></i></a>
        </li>
    @endif
    @if($key == 'linkedin')
        <li>
        <a href="{{$value}}" target="_blank" title="Linkedin"><i class="mdi mdi-linkedin"></i></a>
        </li>
    @endif
    @if($key == 'telegram')
        <li>
        <a href="{{$value}}" target="_blank" title="Telegram"><i class="mdi mdi-telegram"></i></a>
        </li>
    @endif

    @endforeach
    </ul>
    </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="footer-content fml-25">
        <h2 style="color: #000;">Address</h2>
        <ul>
    @foreach($address as $location)
        <li>
            <span class="footer_item" style="color:#000"><i class="flaticon-next footer_item_li"></i>{{$location->address}}</span>
        </li>
    @endforeach
        </ul>
        </div>
    </div>
         
    <div class="col-lg-3 col-md-6">
    <div class="footer-content fml-25">
    <h2 style="color: #000;">Email Address</h2>
    <ul>
    @foreach($email as $email_address)
    <li>
         <span class="footer_item" style="color:#000"><i class="flaticon-next footer_item_li"></i>{{$email_address->email}}</span> 
    </li>
    @endforeach
    </ul>
    </div>
    </div>

    <div class="col-lg-2 col-md-6">
    <div class="footer-content fml-15">
    <h2 style="color: #000;">Mobile</h2>
    <ul>
    @foreach($phone as $number)
    <li>
         <span class="footer_item" style="color:#000"><i class="flaticon-next footer_item_li"></i>{{$number->phone}}</span>
    </li>
    @endforeach
    </ul>
    </div>
    </div>
    <div class="col-lg-3 col-md-6">
    <div class="footer-content fml-15 fml-20">
    </div>
    </div>
    </div>
    </div>
    </div>
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

    <script src="{{asset('public/website/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/jquery.meanmenu.js')}}"></script>

    <script src="{{asset('public/website/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/wow.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/isotope.pkgd.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/form-validator.min.js')}}"></script>

    <script src="{{asset('public/website/assets/js/contact-form-script.js')}}"></script>

    <script src="{{asset('public/website/assets/js/main.js')}}"></script>

    <script src="{{asset('public/website/assets/js/jquery.simplePagination.js')}}"></script>

    <script src="{{asset('public/website/assets/js/customPagination.js')}}"></script>

    <script>
        var interval = setInterval(function() {

        document.querySelector('.owl-next').click();

        }, 7000);
    </script>

    </body>
    </html>