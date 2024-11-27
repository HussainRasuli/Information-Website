@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

@if(Session::has('add_donation'))
    <div id="toast-container" class="toast-container toast-bottom-right toast_message">
        <div class="toast toast-success" aria-live="polite" style="display:block;">
            <div class="toast-title">Description of Donation</div>
            <div class="toast-message">{{Session::get('add_donation')}}</div>
        </div>
    </div>
@endif
@if(Session::has('update_donation'))
    <div id="toast-container" class="toast-container toast-bottom-right toast_message">
        <div class="toast toast-success" aria-live="polite" style="display:block;">
            <div class="toast-title">Description of Donation</div>
            <div class="toast-message">{{Session::get('update_donation')}}</div>
        </div>
    </div>
@endif

<div class="col-12 p-0" id="staff_header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title">Description of Donation</h4>
             @if($data->isEmpty())
                <a href="{{route('donation_form')}}" class="btn btn-primary">Add Description</a>
             @else
             @foreach($data as $x)
                <div class="col-12">
                    <a href="#" class="btn btn-primary ml-1 waves-effect waves-light edit_donation_des" id="{{$x->donation_des_id}}" style="float: right;"><i class="feather icon-edit-1"></i> Edit Info</a>
                    <button class="btn btn-outline-danger waves-effect waves-light delete_donation_des" id="{{$x->donation_des_id}}" style="float: right;"><i class="feather icon-trash-2"></i> Delete</button>
                </div>
             @endforeach
            @endif
            </div>
        </div>
    </div>

@foreach($data as $y)
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header" style="padding-bottom: 1.5rem;">
                <h4 class="card-title">{{$y->donation_title}}</h4>
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
                      {{$y->donation_des}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach


<form method="post" hidden id="send_id_donation_des">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>


@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>


<script>

$('.edit_donation_des').click(function(){
        var donation_des_id = $(this).attr('id');
        $.get("{{route('edit_donation_des')}}/" + donation_des_id , function(res){
            $('.res').html(res);
            $('#donation_des').modal('show');
        });
 });


 $('.delete_donation_des').click(function() {
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
            $.post("{{route('delete_donation_des')}}", $('#send_id_donation_des').serialize(), function(response) {
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