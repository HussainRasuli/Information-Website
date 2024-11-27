

<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="donation_des" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Descriptions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_donation_des')}}" method="post">
                      @csrf
                      <input type="hidden" name="donation_des_id" value="{{$data->donation_des_id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">
                        <div class="col-md-12 col-12">
                          <div class="form-label-group position-relative has-icon-left">
                            <input type="text" class="form-control lm-input-text title" name="title" value="{{$data->donation_title}}" placeholder="Title">
                            <h6 class="title-error error_message">Enter title</h6>
                            <div class="form-control-position">
                                <i class="fa fa-pencil"></i>
                                </div>
                            <label for="first-name-floating-icon">Title</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                            <textarea class="form-control message" id="basicTextarea" rows="4" placeholder="Slider Description" name="des">{{$data->donation_des}}</textarea>
                            <h6 class="message-error error_message">Enter message</h6>
                            <div class="form-control-position">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                <label for="first-name-floating-icon">Description</label>
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

    <script src="{{asset('public/admin_panel/app-assets/js/validation/more_about_validation.js')}}"></script>