@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

@if(Session::has('add_cover_image'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Cover Image</div>
        <div class="toast-message">{{Session::get('add_cover_image')}}</div>
    </div>
</div>
@endif
@if(Session::has('not_add_cover_image'))
<div id="toast-container" class="toast-container toast-top-right toast_message">
    <div class="toast toast-error" aria-live="assertive" style="display:block;">
        <div class="toast-title">Oops... Something is Wrong !</div>
        <div class="toast-message">{{Session::get('not_add_cover_image')}}</div>
    </div>
</div>
@endif
@if(Session::has('edit_cover_image'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Cover Image</div>
        <div class="toast-message">{{Session::get('edit_cover_image')}}</div>
    </div>
</div>
@endif

<div class="col-12 p-0" id="header">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-1">
                <h4 class="card-title"></h4>
            
                <div class="col-12">
                    <a href="#" class="btn btn-primary ml-1 waves-effect waves-light cover_image_form" style="float: right;"><i class="fa fa-picture-o"> </i> Add Cover Image</a>
                </div>
             
            </div>
        </div>
    </div>


<div class="row col-12">
  @foreach($data as $cover_image)
  <div class="col-md-3 col-12">
    <div class="card">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="{{ url('/storage/app/CoverImage/'.$cover_image->path) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title text-center">{{$cover_image->type}}</h4><hr>
                <div class="col-12 text-center">
                      <button class="btn btn-outline-danger waves-effect waves-light mb-1 mt-1 delete_cover_image" id="{{$cover_image->cover_id}}"><i class="feather icon-trash-2"></i> Delete</button>
                      <a href="#" class="btn btn-primary waves-effect waves-light edit_cover_image" id="{{$cover_image->cover_id}}"><i class="feather icon-edit-1"></i> Edit</a>
               </div>
            </div>
        </div>
    </div>
    </div>
  @endforeach
 </div>



    
<form method="post" hidden id="send_id_cover_image">
    @csrf
  <input type="text" name="id" class="id">
</form>

<div class="res"></div>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/scripts/modal/components-modal.js')}}"></script>



<script>

$('.cover_image_form').click(function(){
        $.get("{{route('cover_image_form')}}", function(res){
            console.log(res);
            $('.res').html(res);
            $('#add_link').modal('show');
        });
  });


$('.edit_cover_image').click(function(){
    var cover_id   = $(this).attr('id');
    $.get("{{route('edit_cover_image')}}/" + cover_id , function(res){
        $('.res').html(res);
        $('#edit_cover_image').modal('show');
    });
});
   

$('.delete_cover_image').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want to Delete This Cover Image?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).attr('id');
            $('.id').val(id);
            $.post("{{route('delete_cover_image')}}", $('#send_id_cover_image').serialize(), function(response) {
                // console.log(response);
                if (response == 'Deleted') {
                    Swal.fire(
                        'Deleted!',
                        'Cover Image Successfuly Deleted.',
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
    }, 10000);

</script>

@endsection
@endsection
