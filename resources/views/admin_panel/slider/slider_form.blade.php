@extends('admin_panel.layout.master_page')
@section('content')

<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">
<style>
    .error_message{
        color:red;
    }
</style>

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
             <div class="card-header col-12 pr-0">
                 <h4>Add Slider</h4>
                    <div class="col-3">
                        <a href="{{route('view_slider')}}"><button type="button" class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light float-right"><i class="feather icon-arrow-right"></i></button></a>
                   </div>
                </div>
                <div class="div-devider"></div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{route('add_slider')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                              <div class="content-div row">
                                <div class="row col-md-12">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="text" class="form-control lm-input-text faculty" id="faculty" name="title" placeholder="Title of Slider">
                                                <div class="form-control-position">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                            <label for="first-name-floating-icon">Title of Slider</label>
                                         </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group position-relative has-icon-left">
                                        <textarea class="form-control" id="basicTextarea" rows="1" placeholder="Slider Description" name="des"></textarea>
                                        <div class="form-control-position">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                          <label for="first-name-floating-icon">Slider Description</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach Photo</label>
                                                    <input type="file" name="photo" class="dropify photo" data-max-file-size="" data-height="100" data-allowed-file-extensions="JPG jpg PNG png JPEG jpeg" />
                                                        <h6 class="photo-error error_message">Attach an image.</h6>
                                                        @error('photo')
                                                                <h6 class="error_message">{{$message}}</h6>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 btn-submit">
                                    <button type="submit" id="btn_submit" class="btn btn-primary mr-1 mb-1 mt-1 col-lg-2 col-md-2 col-sm-12 waves-effect waves-light add_slider">Add</button>
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
<script src="{{asset('public/admin_panel/app-assets/js/validation/slider_validation.js')}}"></script>
<script>

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