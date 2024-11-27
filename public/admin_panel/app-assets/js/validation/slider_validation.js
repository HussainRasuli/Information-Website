
$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/;

    let PhotoError = true;
    $('.photo').keyup(function () {
         Photo();
    });

    function Photo() {
        let data = $('.photo').val();
        if (data == '') {
            $('.photo-error').show();
            PhotoError = false;
            return false;
        } else {
            $('.photo-error').hide();
            PhotoError = true;
        }
    }

    $('.add_slider').click(function(){
        Photo();
        
        if((PhotoError == true)){
            return true;
        }else{
            return false;
        }
    });
});