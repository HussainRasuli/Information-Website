
@extends('admin_panel.layout.master_page')
    @section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

    @if(Session::has('add_contact_form_text'))
    <div id="toast-container" class="toast-container toast-bottom-right toast_message">
        <div class="toast toast-success" aria-live="polite" style="display:block;">
            <div class="toast-title">Information</div>
            <div class="toast-message">{{Session::get('add_contact_form_text')}}</div>
        </div>
    </div>
    @endif
    @if(Session::has('update_contact_form'))
    <div id="toast-container" class="toast-container toast-bottom-right toast_message">
        <div class="toast toast-success" aria-live="polite" style="display:block;">
            <div class="toast-title">Information</div>
            <div class="toast-message">{{Session::get('update_contact_form')}}</div>
        </div>
    </div>
    @endif
    
    <div class="col-12 p-0" id="staff_header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title">Contact Form</h4>
              @if($data->isEmpty())
                <a href="{{route('view_contact_form')}}" class="btn btn-primary">Add Text to Contact Form</a>
              @else
              @foreach($data as $a)
                <div class="col-12">
                    <a href="#" class="btn btn-primary ml-1 waves-effect waves-light edit_text" id="{{$a->contact_form_id}}" style="float: right;"><i class="feather icon-edit-1"></i> Edit Info</a>
                    <button class="btn btn-outline-danger waves-effect waves-light delete_text" id="{{$a->contact_form_id}}" style="float: right;"><i class="feather icon-trash-2"></i> Delete</button>
                </div>
              @endforeach
              @endif
            </div>
        </div>
    </div>
@foreach($data as $x)
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="padding-bottom: 1.5rem;">
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse" class=""><i class="feather icon-chevron-down"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show" style="">
                <div class="card-body">
                    <p>
                      {{$x->contact_form_text}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach


<form method="post" hidden id="send_id_more_info">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>


@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>

<script>

$('.edit_text').click(function(){
        var text_id = $(this).attr('id');
        $.get("{{route('edit_contact_form')}}/" + text_id , function(res){
            $('.res').html(res);
            $('#contact_form').modal('show');
        });
        
    });

    $('.delete_text').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete the Information!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_contact_form')}}", $('#send_id_more_info').serialize(), function(response) {
                console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Information Successfuly Deleted.',
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