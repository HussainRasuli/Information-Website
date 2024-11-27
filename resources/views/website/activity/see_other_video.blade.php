


<div class="single-slider" id="video_div">
<div class="">
   @if($activity_detail->type == 'Link')
    
    <iframe height="450"  src="{{ url('https://www.youtube.com/embed/'.$activity_detail->video_or_link) }}" allowfullscreen="" style="width:100%;"></iframe>

   @endif
   @if($activity_detail->type == 'Video')
    <video height="450" controls style="width:100%;">
        <source src="{{url('/storage/app/activity_video/'.$activity_detail->video_or_link)}}" type="video/mp4">
    </video>
   @endif
</div>
<div class="content" style="margin-left: 0px !important;">
<h2>{{$activity->activity_title}}</h2>
<p>{{$activity_detail->act_det_des}}</p>
</div>
</div>