


@extends('admin_panel.layout.master_page')
@section('content')

<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
             <div class="card-header col-12 pr-0">
                 <h4>Add Image</h4>
                    <div class="col-3">
                        <a href="{{route('galary')}}"><button type="button" class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light float-right"><i class="feather icon-arrow-right"></i></button></a>
                   </div>
                </div>
                <div class="div-devider"></div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{route('add_galary')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                              <div class="content-div row">
                              <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text" name="title" placeholder="Title">
                                        <div class="form-control-position">
                                            <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Title</label>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <select class="select2 form-control staff-education" name="category" required>
                                                <option value="" selected hidden>Select Category</option>
                                                <option value="Students">Students</option>
                                                <option value="Teachers">Teachers</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Donations">Donations</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            @error('category')
                                                <h6 class="error_message">{{$message}}</h6>
                                            @enderror 
                                        </div>
                                    </div>
                                <div class="row col-md-6 col-12">
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach Image</label>
                                                    <input type="file" name="photo" class="dropify" required data-max-file-size="" data-height="100" data-allowed-file-extensions="JPG jpg PNG png JPEG jpeg" />
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
                                    <button type="submit" id="btn_submit" class="btn btn-primary mr-1 mb-1 mt-1 col-lg-2 col-md-2 col-sm-12 waves-effect waves-light">Add</button>
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