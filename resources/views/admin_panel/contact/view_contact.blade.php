@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

@if(Session::has('add_email'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Email Address</div>
        <div class="toast-message">{{Session::get('add_email')}}</div>
    </div>
</div>
@endif
@if(Session::has('add_phone'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Phone Number</div>
        <div class="toast-message">{{Session::get('add_phone')}}</div>
    </div>
</div>
@endif
@if(Session::has('add_address'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Address</div>
        <div class="toast-message">{{Session::get('add_address')}}</div>
    </div>
</div>
@endif
@if(Session::has('update_edit_email'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Email</div>
        <div class="toast-message">{{Session::get('update_edit_email')}}</div>
    </div>
</div>
@endif
@if(Session::has('update_edit_phone'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Phone</div>
        <div class="toast-message">{{Session::get('update_edit_phone')}}</div>
    </div>
</div>
@endif
@if(Session::has('update_edit_address'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Address</div>
        <div class="toast-message">{{Session::get('update_edit_address')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="staff_header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title"></h4>
            
                <div class="col-12">
                    <a href="#" class="btn btn-primary ml-1 mb-1 waves-effect waves-light add_email" id="" style="float: right;"><i class="fa fa-envelope-o"></i> Add Email Address</a>
                    <a href="#" class="btn btn-primary ml-1 mb-1 waves-effect waves-light add_phone" id="" style="float: right;"><i class="fa fa-phone-square"></i> Add Phone Number</a>
                    <a href="#" class="btn btn-primary ml-1 mb-1 waves-effect waves-light add_address" id="" style="float: right;"><i class="fa fa-map-marker"></i> Add Address</a>
                    <button class="btn btn-outline-danger waves-effect waves-light delete_all" id="" style="float: right;"><i class="feather icon-trash-2"></i> Delete All</button>
                </div>
             
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card" style="height: 387.516px;">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Email</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($email as $a)
                <li class="list-group-item">
                        <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_email" id="{{$a->email_id}}" style="float: right;"><i class="fa fa-pencil-square-o"></i></button>
                        <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_email" id="{{$a->email_id}}" style="float: right;"><i class="fa fa-trash-o"></i></button>
                    {{$a->email}}
                    </li>
                    @endforeach     
                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card" style="height: 387.516px;">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Phone</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($phone as $a)
                <li class="list-group-item">
                        <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_phone" id="{{$a->phone_id}}" style="float: right;"><i class="fa fa-pencil-square-o"></i></button>
                        <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_phone" id="{{$a->phone_id}}" style="float: right;"><i class="fa fa-trash-o"></i></button>
                    {{$a->phone}}
                    </li>
                    @endforeach     
                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card" style="height: 387.516px;">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Address</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($address as $a)
                <li class="list-group-item">
                        <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_address" id="{{$a->address_id}}" style="float: right;"><i class="fa fa-pencil-square-o"></i></button>
                        <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_address" id="{{$a->address_id}}" style="float: right;"><i class="fa fa-trash-o"></i></button>
                    {{$a->address}}
                    </li>
                    @endforeach     
                </ul>
            </div>
        </div>
    </div>

</div>



<form method="post" hidden id="send_id_contact">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>


<script>

$('.add_email').click(function(){
        $.get("{{route('view_email_modal')}}/", function(res){
            $('.res').html(res);
            $('#email_modal').modal('show');
        });
 });

 $('.add_phone').click(function(){
        $.get("{{route('view_phone_modal')}}/", function(res){
            $('.res').html(res);
            $('#phone_modal').modal('show');
        });
 });

 $('.add_address').click(function(){
        $.get("{{route('view_address_modal')}}/", function(res){
            $('.res').html(res);
            $('#address_modal').modal('show');
        });
 });

$('.delete_all').click(function() {
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
            $.post("{{route('delete_all')}}", $('#send_id_contact').serialize(), function(response) {
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


$('.edit_email').click(function(){
        var email_id = $(this).attr('id');
        $.get("{{route('edit_email_modal')}}/" + email_id , function(res){
            $('.res').html(res);
            $('#edit_email_modal').modal('show');
        });
});


$('.delete_email').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Email!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_edit_email')}}", $('#send_id_contact').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Email Successfuly Deleted.',
                        'success'
                    );
                    loadPage();
                }
            });
        }
    });
});


$('.edit_phone').click(function(){
        var phone_id = $(this).attr('id');
        $.get("{{route('edit_phone_modal')}}/" + phone_id , function(res){
            $('.res').html(res);
            $('#edit_phone_modal').modal('show');
        });
});


$('.delete_phone').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Phone Number!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_edit_phone')}}", $('#send_id_contact').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Phone Number Successfuly Deleted.',
                        'success'
                    );
                    loadPage();
                }
            });
        }
    });
});


$('.edit_address').click(function(){
        var address_id = $(this).attr('id');
        $.get("{{route('edit_address_modal')}}/" + address_id , function(res){
            $('.res').html(res);
            $('#edit_address_modal').modal('show');
        });
});


$('.delete_address').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Address!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_edit_address')}}", $('#send_id_contact').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Address Successfuly Deleted.',
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