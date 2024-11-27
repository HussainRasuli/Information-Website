@extends('website.layout.website_master_page')
@section('content')

<style>
    .flaticon-left-arrow{
        display:none;
    }
    .flaticon-next{
        display:none;
    }
    .simple-pagination .current {
        background: #0d6efd;
        color: #f8fafd;
    }
</style>

<div class="banner-area teacher-details" @foreach($cover_image as $image) style="background: url('{{ url('/storage/app/CoverImage/'.$image->path) }}');position: relative;background-size: cover;background-repeat: no-repeat;z-index: 1;" @endforeach>
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-title-content">
<h2>Teachers</h2>
<ul>
<li>
<a href="{{ route('/') }}"> Home </a>
<i class="flaticon-fast-forward"></i>
<p class="active">
Teachers
</p>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<section class="single-teacher-area pt-4">
<div class="container">
<div class="row">
 @if($teachers->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
        </div>
    </div>
 @else
@foreach($teachers as $one_teacher)
<div class="col-lg-8 col-md-7">
<div class="teacher-slider owl-carousel owl-theme" id="teacher_area_div">
<div class="single-slider" id="teacher_div">
<div class="teacher-img">
<img style="width:50% !important;" src="{{ url('/storage/app/teacher/'.$one_teacher->teacher_image) }}" alt="teacher" />
</div>
<div class="content">
<h2>{{$one_teacher->teacher_name}} {{$one_teacher->teacher_lastname}}</h2>
<p>{{$one_teacher->teacher_des}}</p>
</div>
</div>
</div>
</div>
@endforeach
 @endif

<div class="col-lg-4 col-md-5">
<div class="right-content">
<p class="visit">Others Teachers</p>
 @if($all_teacher->isEmpty())
    <div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i><i class="feather icon-info mr-1 align-middle"></i>There is No Information to Display.</p>
        </div>
    </div>
 @else
 <div class="wrapper">
@foreach($all_teacher as $all_teachers)
<div class="single-teacher items">
<div class="row align-items-center">
<div class="col-3 col-md-4">
<img src="{{ url('/storage/app/teacher/'.$all_teachers->teacher_image) }}" alt="teacher">
</div>
<div class="col-9 col-md-8">
<div class="content">
<a href="#" class="see_other_teacher" id="{{$all_teachers->teacher_id}}">
<h2>{{$all_teachers->teacher_name}} {{$all_teachers->teacher_lastname}}</h2>
<p>{{$all_teachers->position}}</p>
</a>
</div>
</div>
</div>
</div>
@endforeach
</div>

<div class="col-lg-12 text-center">
<div class="col-md-12 col-sm-12 content_div mt-2" id="current_staff_pagination">
<div class="card" style="background: #ffffff;">
    <div class="card-content">
        <div class="card-body" style="padding-bottom:8px;">
                <div id="pagination-container"></div>
        </div>
    </div>
</div>
</div>
</div>
 @endif



</div>
</div>
</div>
</div>
</section>

@section('website_script')
<script src="{{asset('public/website/assets/js/jquery.simplePagination.js')}}"></script>
<script src="{{asset('public/website/assets/js/teacher_customPagination.js')}}"></script>

<script>

$('.see_other_teacher').click(function(){
    var teacher_id = $(this).attr('id');
    $.get("{{route('see_other_teacher')}}/" + teacher_id , function(res){
        $('#teacher_div').hide();
        $('#teacher_area_div').html(res);
    });
});



</script>

@endsection
@endsection