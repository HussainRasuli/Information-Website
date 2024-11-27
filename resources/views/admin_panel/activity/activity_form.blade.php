
@extends('admin_panel.layout.master_page')
@section('content')

<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
             <div class="card-header col-12 pr-0">
                 <h4>Add Activity</h4>
                    <div class="col-3">
                        <a href="{{route('activity')}}"><button type="button" class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light float-right"><i class="feather icon-arrow-right"></i></button></a>
                   </div>
                </div>
                <div class="div-devider"></div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{route('store_activity')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                              <div class="content-div row">
                              <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text title" name="title" required value="{{ old('title') }}" placeholder="Title of Activity">
                                        <h6 class="title-error error_message">Enter Title</h6>
                                            @error('title')
                                                <h6 class="error_message">{{$message}}</h6>
                                            @enderror 
                                        <div class="form-control-position">
                                            <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Title of Activity</label>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                    <textarea class="form-control" id="basicTextarea" rows="1" placeholder="Description" name="des">{{ old('des') }}</textarea>
                                    <div class="form-control-position">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Description</label>
                                    </div>
                                </div>
                                <div class="row col-md-6 col-12">
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach a Cover Image</label>
                                                    <input type="file" name="photo" class="dropify photo" required value="{{ old('photo') }}" data-max-file-size="" data-height="100" data-allowed-file-extensions="JPG jpg PNG png JPEG jpeg" />
                                                    <h6 class="photo-error error_message">Attach Cover Image</h6>
                                                        @error('photo')
                                                            <h6 class="error_message">{{$message}}</h6>
                                                        @enderror 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12"></div>

                               <div class="col-md-12 col-12" id="upload_div">

                                    <div class="col-md-12 col-12 mt-1" id="current_button">
                                        <h4>-------- Choose Your Video Type (Link or Video) -------- 
                                        <button type="button" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light link" title="Add Link"><i class="fa fa-link"></i></button>
                                        <button type="button" class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light video" title="Upload Video"><i class="fa fa-video-camera"></i></button>
                                        </h4>
                                    </div>
                                    @error('link')
                                        <h6 class="error_message">{{$message}}</h6>
                                    @enderror 
                                </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 btn-submit">
                                    <button type="submit" id="btn_submit" class="btn btn-primary mr-1 mb-1 mt-1 col-lg-2 col-md-2 col-sm-12 waves-effect waves-light submit_btn">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')
<script src="{{asset('public/admin_panel/app-assets/vendors/js/dropify/dropify.min.js')}}"></script>
<script src="{{asset('public/admin_panel/app-assets/js/validation/activity_validation.js')}}"></script>
<script>

$('.video').click(function(){
        $.get("{{route('add_dropify')}}", function(res){
            $('#current_button').hide();
            $('#upload_div').html(res);
        });
});

$('.link').click(function(){
        $.get("{{route('add_link')}}", function(res){
            $('#current_button').hide();
            $('#upload_div').html(res);
        });
});


$('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });



</script>

@endsection
@endsection