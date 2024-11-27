@extends('website.layout.website_master_page')
@section('content')


<div class="banner-area about" @foreach($cover_image as $image) style="background: url('{{ url('/storage/app/CoverImage/'.$image->path) }}');position: relative;background-size: cover;background-repeat: no-repeat;z-index: 1;" @endforeach>
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>About Us</h2>
<ul>
<li>
<a href="{{ route('/') }}"> Home </a>
<i class="flaticon-fast-forward"></i>
<p class="active"> About</p>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<section class="about-area" style="padding: 20px 0;">
<div class="container">
<div class="row">
<div class="col-lg-10 col-md-10">
<div class="single-about">
<div class="about-contnet">
@if($data->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i> <i class="feather icon-info mr-1 align-middle"></i> There is No Information to Display.</p>
        </div>
    </div>
@else
@foreach($data as $x)
<h2 style="margin-top: 1rem !important;margin-bottom: 1rem !important;">{{$x->about_title}}</h2>
<p>{{$x->about_des}}</p>
@endforeach
@endif
</div>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
</section>

@endsection