





 <div class="col-md-12 col-12 mt-1">
    <h4>-------- Choose Your Video Type (Link or Video) --------
    <button type="button" class="btn btn-icon rounded-circle btn-info mr-1 mb-1 waves-effect waves-light video" title="Upload Video"><i class="fa fa-video-camera"></i></button>
    </h4>
</div>
<div class="col-md-6 col-12">
    <div class="form-label-group position-relative has-icon-left">
        <input type="text" class="form-control lm-input-text faculty" name="link" required placeholder="youtube link">
        <div class="form-control-position">
            <i class="fa fa-link"></i>
            </div>
        <label for="first-name-floating-icon">youtube link</label>
    </div>
</div>

<script>
    $('.video').click(function(){
        $.get("{{route('add_dropify')}}", function(res){
            $('#current_button').hide();
            $('#upload_div').html(res);
        });
});
</script>