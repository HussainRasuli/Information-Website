
<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">


<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="edit_teacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Teacher Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_teacher')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="teacher_id" value="{{$data->teacher_id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">
                     <div class="row col-12">
                        <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text" name="firstname" required value="{{$data->teacher_name}}" placeholder="First Name">
                                            <div class="form-control-position">
                                            <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">First Name</label>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text" name="lastname" required value="{{$data->teacher_lastname}}" placeholder="Last Name">
                                            <div class="form-control-position">
                                            <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Last Name</label>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="email" class="form-control lm-input-text" name="email" value="{{$data->email}}" placeholder="Email Address">
                                            <div class="form-control-position">
                                            <i class="fa fa-envelope-o"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Email Address</label>
                                     </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <select class="select2 form-control" name="gender">
                                            <option value="Male" @if($data->gender == 'Male') selected @endif> Male</option>
                                            <option value="Female" @if($data->gender == 'Female') selected @endif> Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <select class="select2 form-control staff-education" name="education">
                                                <option value="" selected hidden>Select Education</option>
                                                <option value="Bachelor" @if($data->education == 'Bachelor') selected @endif> Bachelor</option>
                                                <option value="Master" @if($data->education == 'Master') selected @endif> Master</option>
                                                <option value="PHD" @if($data->education == 'PHD') selected @endif> PHD</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text" name="position" required value="{{$data->position}}" placeholder="Position">
                                            <div class="form-control-position">
                                            <i class="fa fa-briefcase"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Position</label>
                                     </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                    <textarea class="form-control" id="basicTextarea" rows="5" placeholder="Description" name="des">{{$data->teacher_des}}</textarea>
                                    <div class="form-control-position">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mr-0">
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach Photo</label>
                                                    <input type="file" name="photo" class="dropify" data-max-file-size="" data-height="100" data-allowed-file-extensions="JPG jpg PNG png JPEG jpeg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                        <div class="modal-footer pr-3">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>


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


    $(".select2").select2({
        dropdownAutoWidth: true,
        width: '100%'
    });
    </script>