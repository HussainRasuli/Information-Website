
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
@if(Session::has('created'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Account</div>
        <div class="toast-message">{{Session::get('created')}}</div>
    </div>
</div>
@endif
@if(Session::has('update_account'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Account</div>
        <div class="toast-message">{{Session::get('update_account')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="header">
    <div class="card">
        <div class="card-header d-flex justify-content-between p-1">
            <h4 class="card-title"></h4>
        
            <div class="col-12">
                <a href="{{route('account_form')}}" class="btn btn-primary ml-1 waves-effect waves-light" style="float: right;"><i class="fa fa-user-plus"></i> Create Account</a>
            </div>
            
        </div>
    </div>
</div>


<div class="col-12 p-0">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Users List</h4>
            </div>
            <div class="card-content wrapper">
                <div class="table-responsive mt-1" style="padding-left: 10px;padding-right: 10px;padding-bottom: 10px;">
                    <table class="table table-striped table-hover-animation mb-0">
                        <thead>
                            <tr class="table-primary">
                                <th class="pl-2">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     @php $i=1; @endphp
                        @foreach($users as $user)
                            <tr class="items">
                                <td class="pl-2">@php echo $i @endphp</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->type}}</td>
                                <td class="p-1">
                                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="{{$user->name}}" class="avatar pull-up">
                                            @if($user->image == '')
                                                <img class="media-object rounded-circle" src="{{asset('public/admin_panel/app-assets/images/logo/male_user.jpg')}}" alt="Avatar" height="40" width="40">
                                            @else
                                                <img class="media-object rounded-circle" src="{{ url('/storage/app/users/'.$user->image) }}" alt="Avatar" height="40" width="40">
                                            @endif
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_account" id="{{$user->id}}" title="Edit Account"><i class="fa fa-pencil-square-o" style="font-size: 1.2rem;"></i></button>
                                <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_account" id="{{$user->id}}" title="Delete Account"><i class="fa fa-trash-o" style="font-size: 1.2rem;"></i></button>
                                </td>
                            </tr>
                            @php $i++ @endphp
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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


<form method="post" hidden id="send_id_user">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>
<script src="{{asset('public/website/assets/js/jquery.simplePagination.js')}}"></script>
<script src="{{asset('public/website/assets/js/teacher_customPagination.js')}}"></script>

<script>

$('.edit_account').click(function(){
        var id   = $(this).attr('id');
        $.get("{{route('edit_account')}}/" + id , function(res){
            $('.res').html(res);
            $('#edit_account').modal('show');
        });
  });

  $('.delete_account').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Account?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_account')}}", $('#send_id_user').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Account Successfuly Deleted.',
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