



<div class="card">
<div class="card-header col-12 pr-0">
    <h4>Activity Cover Image</h4>
    <div class="col-3">
        <a href="{{route('activity')}}"><button type="button" class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light float-right"><i class="feather icon-arrow-right"></i></button></a>
    </div>
</div>
<div class="div-devider"></div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-6 user-latest-img">
            <img src="{{ url('/storage/app/activity_image/'.$data->activity_image) }}" class="img-fluid mb-1 rounded-sm" alt="avtar img holder">
        </div>
        <div class="col-md-8 col-12">
            <h4>Title of the cover image:</h4>
            <p>{{$data->activity_title}}</p>
            <div class="col-12">
                <a href="#" class="btn btn-primary mr-1 waves-effect waves-light edit_cover_image" id="{{$data->activity_id}}"><i class="feather icon-edit-1"></i> Edit</a>
            </div>
        </div>
      
    </div>
</div>
</div>

<div class="cover_dev"></div>
<script>
    $('.edit_cover_image').click(function(){
        var activity_id = $(this).attr('id');
        $.get("{{route('edit_activity_cover')}}/" + activity_id , function(res){
            $('.cover_dev').html(res);
            $('#edit_activity_cover').modal('show');
        });
});
</script>

