
<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">

<div class="modal-primary mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="add_link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Add Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <form action="{{route('add_cover_image')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="modal-body" style="margin-top:1.8rem !important">
                     <div class="row col-12">
                     <div class="col-md-12 col-12 mr-0">
                                    <div class="col-lg-12 col-md-12 pb-2">
                                        <div id="file-upload0" class="section">
                                            <div class="row section">
                                                <div class="col s12 m8 l9">
                                                    <label for="basicInputFile">Attach Cover Image</label>
                                                    <input type="file" name="photo" class="dropify" required data-max-file-size="" data-height="100" data-allowed-file-extensions="JPG jpg PNG png JPEG jpeg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <select class="select2 form-control staff-education" name="type" required>
                                            <option value="" selected hidden>Select a Page</option>
                                            <option value="About_Page">About_Page</option>
                                            <option value="Activity_Page">Activity_Page</option>
                                            <option value="Teachers_Page">Teachers_Page</option>
                                            <option value="Contact_Page">Contact_Page</option>
                                        </select>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                        <div class="modal-footer pr-3">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Add</button>
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

