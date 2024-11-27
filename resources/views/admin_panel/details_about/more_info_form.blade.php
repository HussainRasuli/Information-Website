@extends('admin_panel.layout.master_page')
@section('content')
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
                 <h4>Add More Information</h4>
                    <div class="col-3">
                        <a href="{{route('more_info')}}"><button type="button" class="btn btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light float-right"><i class="feather icon-arrow-right"></i></button></a>
                   </div>
                </div>
                <div class="div-devider"></div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{route('add_more_info')}}">
                            @csrf
                            <div class="form-body">
                              <div class="content-div row">
                                <div class="row col-md-12">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="text" class="form-control lm-input-text title" name="title" placeholder="Title">
                                            <h6 class="title-error error_message">Enter Title</h6>
                                            @error('title')
                                                <h6 class="error_message">{{$message}}</h6>
                                            @enderror
                                            <div class="form-control-position">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                            <label for="first-name-floating-icon">Title</label>
                                         </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group position-relative has-icon-left">
                                        <textarea class="form-control message" id="basicTextarea" rows="3" placeholder="Description" name="des"></textarea>
                                        <h6 class="message-error error_message">Enter message</h6>
                                        @error('des')
                                                <h6 class="error_message">{{$message}}</h6>
                                        @enderror
                                        <div class="form-control-position">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                          <label for="first-name-floating-icon">Description</label>
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
<script src="{{asset('public/admin_panel/app-assets/js/validation/more_about_validation.js')}}"></script>
@endsection
@endsection
