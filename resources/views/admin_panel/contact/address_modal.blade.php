

<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="address_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Add Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('add_address')}}" method="post">
                      @csrf
                        <div class="modal-body" style="margin-top:1.8rem !important">
                        <div class="col-md-12 col-12">
                            <div class="form-label-group position-relative has-icon-left">
                            <textarea class="form-control address" id="basicTextarea" rows="4" required placeholder="Address" name="address"></textarea>
                            <h6 class="address-error error_message">Enter Address.</h6>
                            <div class="form-control-position">
                                <i class="fa fa-map-marker"></i>
                             </div>
                                <label for="first-name-floating-icon">Address</label>
                            </div>
                        </div>
                       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary submit_btn" id="btn_submit">Add</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    
    <script src="{{asset('public/admin_panel/app-assets/js/validation/address_validation.js')}}"></script>
    