@extends('admin_panel.layout.master_page')
@section('content')



<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}" />


<style>
    .faculty_disable{ 
        pointer-events: not-allowed; 
        cursor: not-allowed; 
    }

    a.faculty_disable:hover {
        cursor:not-allowed;
    }
    .error_message{
        color: red;
    }

</style>

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
             <div class="card-header col-12 pr-0">
                 <h4>Add Slider Image</h4>
                    <div class="col-3">
                    <button type="button" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light minus" disabled><i class="feather icon-minus"></i></button>
                        <button type="button" class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light plus"><i class="feather icon-plus"></i></button>
                        <a href="{{route('about')}}"><button type="button" class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light float-right"><i class="feather icon-arrow-right"></i></button></a>
                   </div>
                </div>
                <div class="div-devider"></div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{route('add_about')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="counter" id="count" value="1">
                            <div class="form-body">
                              <div class="content-div row">
                              <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text title" name="title" placeholder="Title of About">
                                        <h6 class="title-error error_message">Enter Title.</h6>
                                        @error('title')
                                                <h6 class="error_message">{{$message}}</h6>
                                        @enderror
                                        <div class="form-control-position">
                                            <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Title of About</label>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                    <textarea class="form-control message" id="basicTextarea" rows="1" placeholder="Description" name="des"></textarea>
                                    <h6 class="message-error error_message">Enter Title.</h6>
                                        @error('des')
                                                <h6 class="error_message">{{$message}}</h6>
                                        @enderror
                                    <div class="form-control-position">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text faculty" name="item[]" placeholder="Item">
                                            <div class="form-control-position">
                                            <i class="fa fa-pencil-square"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Item</label>
                                     </div>
                                </div>
                                <div class="row col-md-6 col-12">
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach Video</label>
                                                    <input type="file" name="photo" class="dropify" data-max-file-size="" data-height="100" data-allowed-file-extensions="MP4 mp4" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<script src="{{asset('public/admin_panel/app-assets/js/validation/short_about_validation.js')}}"></script>

<script>

$('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });


    var x = 1;
       $('.plus').click( function(){
         if(x == 1){
            $('.minus').attr('disabled',false);
         }
            var faculty = $('.faculty').val();
           x++;
           $('#count').val(x);
           var content = '<div class="row col-md-12" id="y'+x+'">\
                                <div class="col-md-6 col-12">\
                                    <div class="form-label-group position-relative has-icon-left">\
                                        <input type="text" class="form-control lm-input-text faculty" name="item[]" placeholder="Item">\
                                            <div class="form-control-position">\
                                            <i class="fa fa-pencil-square"></i>\
                                            </div>\
                                        <label for="first-name-floating-icon">Item</label>\
                                     </div>\
                                </div>\
                            </div>\
                            ';

           $('.content-div').append(content);
        });

       $('.minus').click( function(){
           $("#y"+x).remove(); 
           x--
           $('#count').val(x);
           if(x == 1){
            $('.minus').attr('disabled',true);
           }
           ;
       });

       


</script>

@endsection
@endsection