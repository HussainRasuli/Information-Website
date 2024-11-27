


<link rel="stylesheet" href="{{ asset('public/admin_panel/app-assets/vendors/css/dropify/dropify.min.css')}}">

<div class="col-md-12 col-12 mt-1">
    <h4>-------- Choose Your Video Type (Link or Video) --------
    <button type="button" class="btn btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light link" title="Add Link"><i class="fa fa-link"></i></button>
   </h4>
</div>

 <div class="row col-md-6 col-12">
    <div class="col-lg-12 col-md-12 pb-2">
        <div id="file-upload0" class="section">
            <div class="row section">
                <div class="col s12 m8 l9">
                    <label for="basicInputFile">Attach Video</label>
                    <input type="file" name="video" class="dropify" required data-max-file-size="" data-height="100" data-allowed-file-extensions="MP4 mp4" />
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $('.link').click(function(){
        $.get("{{route('add_link')}}", function(res){
            $('#current_button').hide();
            $('#upload_div').html(res);
        });
    });

    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });
</script>