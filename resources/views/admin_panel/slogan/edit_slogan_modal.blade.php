

<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="edit_slogan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Slogan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_slogan')}}" method="post">
                      @csrf
                        <div class="modal-body" style="margin-top:1.8rem !important">
                        <input type="hidden" name="slogan_id" value="{{$data->slogan_id}}">
                        <div class="col-md-12 col-12">
                          <div class="form-label-group position-relative has-icon-left">
                            <input type="text" class="form-control lm-input-text" required  name="title" value="{{$data->slogan_title}}" placeholder="Title">
                            <div class="form-control-position">
                                <i class="fa fa-pencil"></i>
                                </div>
                            <label for="first-name-floating-icon">Title</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                            <textarea class="form-control address" id="basicTextarea" rows="4" required placeholder="Your Text" name="des" required>{{$data->slogan_des}}</textarea>
                            <div class="form-control-position">
                                <i class="fa fa-pencil"></i>
                             </div>
                                <label for="first-name-floating-icon">Your Text</label>
                            </div>
                        </div>
                       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    
    