
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

@if(Session::has('add_teacher'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Teacher</div>
        <div class="toast-message">{{Session::get('add_teacher')}}</div>
    </div>
</div>
@endif
@if(Session::has('update_teacher'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Teacher</div>
        <div class="toast-message">{{Session::get('update_teacher')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="header">
    <div class="card">
        <div class="card-header d-flex justify-content-between p-1">
            <h4 class="card-title"></h4>
        
            <div class="col-12">
                <a href="{{route('teacher_form')}}" class="btn btn-primary ml-1 waves-effect waves-light" style="float: right;"><i class="fa fa-user-o"></i> Add Teacher</a>
            </div>
            
        </div>
    </div>
</div>


<div class="col-12 p-0">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Teacher List</h4>
            </div>
            <div class="card-content wrapper">
                <div class="table-responsive mt-1" style="padding-left: 10px;padding-right: 10px;">
                    <table class="table table-striped table-hover-animation mb-0">
                        <thead>
                            <tr class="table-primary">
                                <th class="pl-2">No</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Position</th>
                                <th>Education</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     @php $i=1; @endphp
                        @foreach($all_teacher as $teacher)
                            <tr class="items">
                                <td class="pl-2">@php echo $i @endphp</td>
                                <td>{{$teacher->teacher_name}} {{$teacher->teacher_lastname}}</td>
                                <td>{{$teacher->gender}}</td>
                                <td>{{$teacher->position}}</td>
                                <td>{{$teacher->education}}</td>
                                <td class="p-1">
                                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="{{$teacher->teacher_name}} {{$teacher->teacher_lastname}}" class="avatar pull-up">
                                            <img class="media-object rounded-circle" src="{{ url('/storage/app/teacher/'.$teacher->teacher_image) }}" alt="Avatar" height="40" width="40">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                <button type="button" class="btn btn-icon btn-flat-warning mr-1 mb-1 waves-effect waves-light view_teacher" id="{{$teacher->teacher_id}}" title="View"><i class="fa fa-eye" style="font-size: 1.2rem;"></i></button>
                                <button type="button" class="btn btn-icon btn-flat-success mr-1 mb-1 waves-effect waves-light edit_teacher" id="{{$teacher->teacher_id}}" title="Edit"><i class="fa fa-pencil-square-o" style="font-size: 1.2rem;"></i></button>
                                <button type="button" class="btn btn-icon btn-flat-danger mr-1 mb-1 waves-effect waves-light delete_teacher" id="{{$teacher->teacher_id}}" title="Delete"><i class="fa fa-trash-o" style="font-size: 1.2rem;"></i></button>
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

@if(! $all_teacher->isEmpty())
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
@endif


<form method="post" hidden id="send_id_teacher">
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

$('.edit_teacher').click(function(){
        var teacher_id   = $(this).attr('id');
        $.get("{{route('edit_teacher')}}/" + teacher_id , function(res){
            $('.res').html(res);
            $('#edit_teacher').modal('show');
        });
  });

  $('.view_teacher').click(function(){
        var teacher_id   = $(this).attr('id');
        $.get("{{route('view_teacher')}}/" + teacher_id , function(res){
            $('.res').html(res);
            $('#view_teacher').modal('show');
        });
  });

  
$('.delete_teacher').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Teacher!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_teacher')}}", $('#send_id_teacher').serialize(), function(response) {
                // console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Teacher Successfuly Deleted.',
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