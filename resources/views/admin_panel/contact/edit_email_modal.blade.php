
<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="edit_email_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_edit_email')}}" method="post">
                      @csrf
                      <input type="hidden" name="email_id" value="{{$data->email_id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">
                        <div class="col-md-12 col-12">
                          <div class="form-label-group position-relative has-icon-left">
                            <input type="email" class="form-control lm-input-text email" required  name="email" value="{{$data->email}}" placeholder="Email">
                            <h6 class="email-error error_message">Enter Email Address.</h6>
                            <div class="form-control-position">
                                <i class="fa fa-envelope-o"></i>
                                </div>
                            <label for="first-name-floating-icon">Email</label>
                            </div>
                        </div>
                       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary submit_btn" id="btn_submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <script src="{{asset('public/admin_panel/app-assets/js/validation/email_validation.js')}}"></script>