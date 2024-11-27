

<div class="single-slider" id="teacher_div">
<div class="teacher-img">
<img style="width:50% !important;" src="{{ url('/storage/app/teacher/'.$data->teacher_image) }}" alt="teacher" />
</div>
<div class="content">
<h2>{{$data->teacher_name}} {{$data->teacher_lastname}}</h2>
<p>{{$data->teacher_des}}</p>
</div>
</div>