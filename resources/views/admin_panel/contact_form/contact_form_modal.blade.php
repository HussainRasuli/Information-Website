



<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="contact_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_contact_form')}}" method="post">
                      @csrf
                      <input type="hidden" name="about_id" value="{{$data->contact_form_id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">

                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                            <textarea class="form-control message" id="basicTextarea" rows="4" placeholder="Slider Description" name="des">{{$data->contact_form_text}}</textarea>
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
