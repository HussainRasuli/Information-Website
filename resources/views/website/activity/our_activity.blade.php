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
<h2>Our Activity</h2>
<ul>
<li>
<a href="{{ route('/') }}"> Home </a>
<i class="flaticon-fast-forward"></i>
<p class="active">
 Our Activity
</p>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<section class="single-teacher-area" style="padding-top: 20px;">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-7">
<div class="teacher-slider owl-carousel owl-theme" id="video_area_div">

<div class="single-slider" id="video_div">
<div class="">
   @if($activity_detail->type == 'Link')
    
    <iframe height="450"  src="{{ url('https://www.youtube.com/embed/'.$activity_detail->video_or_link) }}" allowfullscreen="" style="width:100% !important;"></iframe>

   @endif
   @if($activity_detail->type == 'Video')
    <video height="450" controls style="width:100% !important;">
        <source src="{{url('/storage/app/activity_video/'.$activity_detail->video_or_link)}}" type="video/mp4">
    </video>
   @endif
</div>
<div class="content" style="margin-left: 0px !important;">
<h2>{{$activity->activity_title}}</h2>
<p>{{$activity_detail->act_det_des}}</p>
</div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-5">
<div class="right-content">

<div class="input-group">
<input type="text" class="form-control about-search" id="video_search" placeholder="Search..." />
</div>
<button class="serach_icon"><i class="flaticon-search"></i></button>

<div class="right-content hide_div"></div>

<div class="right-content" id="video_div_area">
<p class="visit">Vidoes</p>
<div class="wrapper">
@foreach($all_video as $videos)
    <div class="single-teacher items">
    <div class="row align-items-center">
    <div class="col-md-5 col-4">
   @if($videos->type == 'Video')
    <video width="110" height="100" controls>
        <source src="{{url('/storage/app/activity_video/'.$videos->video_or_link)}}" type="video/mp4">
    </video>
   @endif
   @if($videos->type == 'Link')
   <iframe width="110" height="100"  src="{{ url('https://www.youtube.com/embed/'.$videos->video_or_link) }}" allowfullscreen=""></iframe>
   @endif
    </div>
    <div class="col-md-7 col-8">
    <div class="content" style="margin-left: 0px !important;">
    <a href="#" class="see_other_video" id="{{$videos->act_detial_id}}">
    <h2>{{$videos->activity_title}}</h2>
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


</div>
</div>

</div>
</div>
</div>
</section>

<form method="post" hidden id="video_search_form">
    @csrf
  <input type="text" name="search" class="id">
</form>

@section('website_script')
<script src="{{asset('public/website/assets/js/jquery.simplePagination.js')}}"></script>
<script src="{{asset('public/website/assets/js/teacher_customPagination.js')}}"></script>

<script>

$(document).on('click','.see_other_video', function(){
    var act_detial_id = $(this).attr('id');
    $.get("{{route('see_other_video')}}/" + act_detial_id , function(res){
        $('#video_div').hide();
        $('#video_area_div').html(res);
    });
});
    

$('.hide_div').hide();
$('#video_search').keyup(function(enter){
    var value = $(this).val();
    var search_data = $('.id').val(value);
  if(value != '' && enter.keyCode == 13){
    $('.hide_div').show();
    $('#video_div_area').hide();
           $.post("{{route('search_video')}}", $('#video_search_form').serialize(), function(res){
               console.log(res);
                $('.hide_div').html(res);
           });
       }
       else {
            $('.hide_div').hide();
            $('#video_div_area').show();
       }
});

$('.serach_icon').click(function(){
    var value = $('#video_search').val();

    var search_data = $('.id').val(value);
  if(value != ''){
    $('.hide_div').show();
    $('#video_div_area').hide();
           $.post("{{route('search_video')}}", $('#video_search_form').serialize(), function(res){
               console.log(res);
                $('.hide_div').html(res);
           });
       }
       else {
            $('.hide_div').hide();
            $('#video_div_area').show();
       }
});


</script>
@endsection
@endsection