
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

@if(Session::has('add_galary_image'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Image</div>
        <div class="toast-message">{{Session::get('add_galary_image')}}</div>
    </div>
</div>
@endif
@if(Session::has('update_galary_image'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Image</div>
        <div class="toast-message">{{Session::get('update_galary_image')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title"></h4>
            
                <div class="col-12">
                    <a href="{{route('galary_form')}}" class="btn btn-primary ml-1 waves-effect waves-light" style="float: right;"><i class="fa fa-file-image-o"></i> Add Image</a>
                </div>
             
            </div>
        </div>
    </div>

 <div class="row col-12 wrapper">
  @foreach($data as $galary)
  <div class="col-md-3 col-12 items">
    <div class="card">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="{{ url('/storage/app/galary/'.$galary->galary_image) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">{{$galary->title}}</h4><hr>
                <div class="col-12 text-center">
                      <button class="btn btn-outline-danger waves-effect waves-light mb-1 mt-1 delete_galary_image" id="{{$galary->galary_id}}"><i class="feather icon-trash-2"></i> Delete</button>
                      <a href="#" class="btn btn-primary waves-effect waves-light edit_galary_image" id="{{$galary->galary_id}}"><i class="feather icon-edit-1"></i> Edit</a>
               </div>
            </div>
        </div>
    </div>
    </div>
  @endforeach
 </div>

 @if(! $data->isEmpty())
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

<form method="post" hidden id="send_id_galary">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>
<script src="{{asset('public/website/assets/js/jquery.simplePagination.js')}}"></script>
<script src="{{asset('public/website/assets/js/galary_customPagination.js')}}"></script>

<script>


$('.edit_galary_image').click(function(){
        var galary_id   = $(this).attr('id');
        $.get("{{route('edit_galary')}}/" + galary_id , function(res){
            $('.res').html(res);
            $('#edit_galary').modal('show');
        });
  });

  
$('.delete_galary_image').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Image?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_galary')}}", $('#send_id_galary').serialize(), function(response) {
                // console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Image Successfuly Deleted.',
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
