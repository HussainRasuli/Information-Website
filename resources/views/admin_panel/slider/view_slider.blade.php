@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">
<style>
.dropdown{
    padding: .4rem .7rem;
}
.dropdown-menu a:hover{
    color: white !important;
    background : #2c6db1 !important;
 }

 .dropdown .fa-ellipsis-t {
    padding: 0.5rem 0.7rem !important;
    border-radius: 3px !important;
    background-color: #2d6fb4 !important;
    border-color: #2d6fb4 !important;
}
</style>

@if(Session::has('added'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Slider</div>
        <div class="toast-message">{{Session::get('added')}}</div>
    </div>
</div>
@endif
@if(Session::has('added_image'))
<div id="toast-container" class="toast-container toast-top-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Image</div>
        <div class="toast-message">{{Session::get('added_image')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_slider_title'))
<div id="toast-container" class="toast-container toast-top-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Slider Title</div>
        <div class="toast-message">{{Session::get('edit_slider_title')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_slider_image'))
<div id="toast-container" class="toast-container toast-top-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Slider Image</div>
        <div class="toast-message">{{Session::get('edit_slider_image')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="staff_header">
    <div class="card">
        <div class="card-header d-flex justify-content-between p-1">
            <h4 class="card-title">Slider List</h4>
      
            <a href="{{route('slider_form')}}" class="btn btn-primary">Add Slider</a>
      
        </div>
    </div>
</div>


<div class="row col-12">
@foreach($image as $y)
<div class="col-xl-4 col-md-6 col-sm-12">
    <div class="card" style="height: 486.062px;">
        <div class="card-content">
            <div class="card-body">
                <img class="card-img img-fluid mb-1" src="{{ url('/storage/app/slider/'.$y->slider_image) }}" alt="Card image cap">
                <h5 class="mt-1">{{$y->slider_title}}</h5>
                <p class="card-text">{{ Str::limit($y->slider_des, 60)}}</p>
                <hr class="my-1">
                <div class="card-btns d-flex " style="justify-content:space-evenly;">           
                    <button class="btn btn-outline-danger waves-effect waves-light mb-1 delete_slider_image" id="{{$y->slider_img_id}}"><i class="feather icon-trash-2"></i> Delete</button>
                    <a href="#" class="btn btn-primary ml-1 mb-1 waves-effect waves-light edit_image" id="{{$y->slider_img_id}}"><i class="feather icon-edit-1"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

<form method="post" hidden id="send_id">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/vendors/js/dropify/dropify.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">




<script>



    $('.edit_image').click(function(){
        var slider_img_id   = $(this).attr('id');
        $.get("{{route('edit_image')}}/" + slider_img_id , function(res){
            $('.res').html(res);
            $('#img').modal('show');
        });
        
    });


$('.delete_slider_image').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete Slider Image!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_slider_image')}}", $('#send_id').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Slider Image Successfuly Deleted.',
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