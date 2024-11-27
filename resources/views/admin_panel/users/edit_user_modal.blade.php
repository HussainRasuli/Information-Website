
<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">


<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="edit_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_user')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="user_id" value="{{$data->id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">
                     <div class="row col-12">
                     <div class="col-md-12 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" class="form-control lm-input-text" value="{{$data->name}}" name="name" required autocomplete="name" placeholder="Name">
                                        @error('name')
                                            <h6 class="error_message">{{ $message }}</h6>
                                        @enderror
                                        <div class="form-control-position">
                                            <i class="fa fa-pencil"></i>
                                            </div>
                                        <label for="first-name-floating-icon">Name</label>
                                     </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="Password" class="form-control lm-input-text" name="password" autocomplete="new_password" placeholder="New Password">
                                        @error('new_password')
                                            <h6 class="error_message">{{ $message }}</h6>
                                        @enderror
                                            <div class="form-control-position">
                                            <i class="fa fa-lock"></i>
                                            </div>
                                        <label for="first-name-floating-icon">New Password</label>
                                     </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach Image</label>
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

    </script>