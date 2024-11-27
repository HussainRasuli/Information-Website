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
        <div class="toast-title">Information</div>
        <div class="toast-message">{{Session::get('added')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_info'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Information</div>
        <div class="toast-message">{{Session::get('edit_info')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_item'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Item</div>
        <div class="toast-message">{{Session::get('edit_item')}}</div>
    </div>
</div>
@endif
@if(Session::has('add_item'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Item</div>
        <div class="toast-message">{{Session::get('add_item')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="staff_header">
    <div class="card">
        <div class="card-header d-flex justify-content-between p-1">
            <h4 class="card-title">About</h4>
            @if($info->isEmpty())
            <a href="{{route('about_form')}}" class="btn btn-primary waves-effect waves-light">Add Short Information</a>
            @else
            @foreach($info as $a)
            <div class="col-12">
                <a href="#" class="btn btn-primary ml-1 waves-effect waves-light add_item" style="float: right;"><i class="fa fa-plus-circle"></i> Add New Item</a>
                <a href="#" class="btn btn-primary ml-1 waves-effect waves-light edit_info" id="{{$a->info_id}}" style="float: right;"><i class="feather icon-edit-1"></i> Edit Info</a>
                <button class="btn btn-outline-danger waves-effect waves-light delete_info" id="{{$a->info_id}}" style="float: right;"><i class="feather icon-trash-2"></i> Delete</button>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>


@foreach($info as $y)
<div class="row col-md-12">-
@if($y->info_title != '')
<div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title text-center">Video</h4>
                </div>
                <div class="embed-responsive embed-responsive-item embed-responsive-16by9">
            <video width="600" height="300" controls>
                <source src="{{ url('/storage/app/about/'.$y->info_video) }}" type="video/mp4">
            </video>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endif

<div class="col-xl-7 col-md-6 col-sm-12">
    <div class="card" style="height: 470.516px;">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">{{$y->info_title}}</h4>
                <p class="card-text">{{$y->info_des}}</p>
            </div>
            <ul class="list-group list-group-flush">
            @foreach($info_item as $y)
                <li class="list-group-item">
                    <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_item" id="{{$y->info_item_id}}" style="float: right;"><i class="fa fa-pencil-square-o"></i></i></button>
                    <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_item" id="{{$y->info_item_id}}" style="float: right;"><i class="fa fa-trash-o"></i></button>
                    {{$y->item_name}}
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
</div>

@endforeach



<form method="post" hidden id="send_id_info">
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
$('.edit_info').click(function(){
        var info_id   = $(this).attr('id');
        $.get("{{route('edit_info')}}/" + info_id , function(res){
            $('.res').html(res);
            $('#info').modal('show');
        });
        
    });

$('.delete_info').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete the all Information!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_info')}}", $('#send_id_info').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'All Information Successfuly Deleted.',
                        'success'
                    );
                    loadPage();
                }
            });
        }
    });

});


$('.edit_item').click(function(){
        var info_item_id  = $(this).attr('id');
        $.get("{{route('edit_item')}}/" + info_item_id , function(res){
            $('.res').html(res);
            $('#info_item').modal('show');
        });
        
    });



$('.delete_item').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete this Item!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_item')}}", $('#send_id_info').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Item Successfuly Deleted.',
                        'success'
                    );
                    loadPage();
                }
            });
        }
    });

});


$('.add_item').click(function(){
        $.get("{{route('item_form')}}/", function(res){
            $('.res').html(res);
            $('#add_item').modal('show');
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