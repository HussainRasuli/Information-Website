@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

@if(Session::has('add_slogan'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Slogan</div>
        <div class="toast-message">{{Session::get('add_slogan')}}</div>
    </div>
</div>
@endif
@if(Session::has('error_slogan'))
<div id="toast-container" class="toast-container toast-top-right toast_message">
    <div class="toast toast-error" aria-live="assertive" style="display:block;">
        <div class="toast-title">Oops... Something is Wrong !</div>
        <div class="toast-message">{{Session::get('error_slogan')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_slogan'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Slogan</div>
        <div class="toast-message">{{Session::get('edit_slogan')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="staff_header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title"></h4>
            
                <div class="col-12">
                    <a href="#" class="btn btn-primary ml-1 waves-effect waves-light add_slogan" style="float: right;"><i class="fa fa-wpforms"></i> Add Slogan</a>
                </div>
             
            </div>
        </div>
    </div>


<div class="row">
@foreach($data as $x)
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card" style="height: 387.516px;">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">{{$x->slogan_title}}</h4>
                </div>
                <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                        {{ Str::limit($x->slogan_des, 200)}}
                        <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_slogan" id="{{$x->slogan_id}}" style="float: right;"><i class="fa fa-pencil-square-o"></i></button>
                        <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_slogan" id="{{$x->slogan_id}}" style="float: right;"><i class="fa fa-trash-o"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach 
</div>


<form method="post" hidden id="send_id_slogan">
    @csrf
  <input type="text" name="id" class="id">
</form>
<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>

<script>

$('.add_slogan').click(function(){
        $.get("{{route('slogan_form')}}", function(res){
            $('.res').html(res);
            $('#slogan_form').modal('show');
        });
 });
 
 $('.edit_slogan').click(function(){
    var slogan_id = $(this).attr('id');
        $.get("{{route('edit_slogan')}}/" + slogan_id , function(res){
            $('.res').html(res);
            $('#edit_slogan').modal('show');
        });
 });


$('.delete_slogan').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete it?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_slogan')}}", $('#send_id_slogan').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Successfuly Deleted.',
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
    }, 8000);


</script>
@endsection
@endsection
