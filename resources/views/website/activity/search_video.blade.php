





<div class="right-content" id="video_div_area">
<p class="visit">Vidoes</p>
@if($all_video->isEmpty())
<div class="col-12 mt-1 mb-1">
        <div class="alert alert-warning">
            <p><i class="fa fa-info-circle"></i> <i class="feather icon-info mr-1 align-middle"></i> There is No Information to Display.</p>
        </div>
    </div>
@else


    @foreach($all_video as $videos)
    <div class="single-teacher">
    <div class="row align-items-center">
    <div class="col-4 col-md-5">
   @if($videos->type == 'Video')
    <video width="110" height="100" controls>
        <source src="{{url('/storage/app/activity_video/'.$videos->video_or_link)}}" type="video/mp4">
    </video>
   @endif
   @if($videos->type == 'Link')
   <iframe width="110" height="100"  src="{{ url('https://www.youtube.com/embed/'.$videos->video_or_link) }}" allowfullscreen=""></iframe>
   @endif
    </div>
    <div class="col-8 col-md-7">
    <div class="content" style="margin-left: 0px !important;">
    <a href="#" class="see_other_video" id="{{$videos->act_detial_id}}">
    <h2>{{$videos->activity_title}}</h2>
    </a>
    </div>
    </div>
    </div>
    </div>
@endforeach
@endif

</div>