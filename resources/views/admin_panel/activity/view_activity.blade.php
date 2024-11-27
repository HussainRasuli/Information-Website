
@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

<style>
    .simple-pagination .current {
        background: #0d6efd;
        color: #f8fafd;
    }
</style>

@if(Session::has('add_activity'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Activity</div>
        <div class="toast-message">{{Session::get('add_activity')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_video'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Activity</div>
        <div class="toast-message">{{Session::get('edit_video')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_cover'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Cover of Activity</div>
        <div class="toast-message">{{Session::get('edit_cover')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title"></h4>
            
                <div class="col-12">
                    <a href="{{route('activity_form')}}" class="btn btn-primary ml-1 waves-effect waves-light" style="float: right;"><i class="feather icon-award"></i> Add Activity</a>
                </div>
             
            </div>
        </div>
    </div>

<div class="row wrapper" id="content_video">
@foreach($activity_detail as $detail)
    <div class="col-xl-4 col-md-6 col-sm-12 items">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title text-center">Video </h4>
                </div>
             @if($detail->type == 'Link')
                <div class="text-center">
                    <iframe class="img-thumbnail" src="{{ url('https://www.youtube.com/embed/'.$detail->video_or_link) }}" allowfullscreen=""></iframe>
                </div>
             @endif
             @if($detail->type == 'Video')
                <div class="embed-responsive embed-responsive-item embed-responsive-16by9">
                    <video width="600" height="300" controls>
                         <source src="{{ url('/storage/app/activity_video/'.$detail->video_or_link) }}" type="video/mp4">
                    </video>
                </div>
             @endif
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($detail->act_det_des, 60) }}</p>
                  <div class="col-12 text-center">
                      <button class="btn btn-outline-danger waves-effect waves-light mb-1 delete_btn" id="{{$detail->act_detial_id}}"><i class="feather icon-trash-2"></i> Delete</button>
                      <a href="#" class="btn btn-primary ml-1 mb-1 waves-effect waves-light edit_btn" id="{{$detail->act_detial_id}}"><i class="feather icon-edit-1"></i> Edit</a>
                      <a href="#" class="btn btn-info ml-1 mb-1 waves-effect waves-light detail" id="{{$detail->activity_id}}"><i class="fa fa-file-image-o"></i> Cover Image</a>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
@endforeach

@if(! $activity_detail->isEmpty())
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
@endif


<form method="post" hidden id="send_id_activity">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>
<script src="{{asset('public/website/assets/js/jquery.simplePagination.js')}}"></script>
<script src="{{asset('public/website/assets/js/activity_customPagination.js')}}"></script>

<script>

$('.detail').click(function(){
        var activity_id = $(this).attr('id');
        $.get("{{route('activity_cover')}}/" + activity_id , function(res){
            $('#header').hide();
            $('#content_video').hide();
            $('.res').html(res);
        });
});

$('.edit_btn').click(function(){
        var act_detial_id = $(this).attr('id');
        $.get("{{route('edit_activity')}}/" + act_detial_id , function(res){
            $('.res').html(res);
            $('#edit_activity').modal('show');
        });
});

$('.delete_btn').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Activity!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_activity')}}", $('#send_id_activity').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Activity Successfuly Deleted.',
                        'success'
                    );
                    loadPage();
                }
            });
        }
    });
});

function loadPage()
    {
        setTimeout(function() {
            location.reload();
        }, 1500);
    }

    setTimeout(function() {
        $('.toast_message').fadeOut('slow');
    }, 3000);


</script>



@endsection
@endsection