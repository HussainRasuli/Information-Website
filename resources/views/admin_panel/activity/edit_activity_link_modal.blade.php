




<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="edit_activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Description or Link of Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('edit_link')}}" method="post">
                      @csrf
                      <input type="hidden" name="act_detial_id" value="{{$data->act_detial_id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">
                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                            <textarea class="form-control" id="basicTextarea" rows="4" placeholder="Description" name="des">{{$data->act_det_des}}</textarea>
                            <div class="form-control-position">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                <label for="first-name-floating-icon">Description</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                                <input type="text" class="form-control lm-input-text faculty" name="link" value="{{$data->video_or_link}}" required placeholder="youtube link">
                                    <div class="form-control-position">
                                    <i class="fa fa-link"></i>
                                    </div>
                                <label for="first-name-floating-icon">youtube link</label>
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


