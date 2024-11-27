

<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="info_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Edit Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('update_item')}}" method="post">
                      @csrf
                      <input type="hidden" name="item_id" value="{{$data->info_item_id}}">
                        <div class="modal-body" style="margin-top:1.8rem !important">

                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                                <input type="text" class="form-control lm-input-text item" name="item" value="{{$data->item_name}}" placeholder="Item">
                                <h6 class="item-error error_message">Enter Item</h6>
                                <div class="form-control-position">
                                    <i class="fa fa-pencil"></i>
                                    </div>
                                <label for="first-name-floating-icon">Item</label>
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

    <script src="{{asset('public/admin_panel/app-assets/js/validation/item_validation.js')}}"></script>