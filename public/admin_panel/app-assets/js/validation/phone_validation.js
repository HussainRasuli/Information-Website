
$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/;

    let phoneError = true;
    $('.phone').keyup(function () {
        Phone();
    });
    function Phone() {
        let phone = $('.phone').val();
        if (phone == '') {
            $('.phone-error').show();
            phoneError = false;
            return false;
        } else if ((phone.length <= 9) || (phone.length >= 16)) {
            $('.phone-error').show();
            $('.phone-error').html('Phone Number Between 10 To 15 Digits.');
            phoneError = false;
            return false;
        } else {
            $('.phone-error').hide();
            phoneError = true;
        }
    }

    $('.submit_btn').click(function(){

        Phone();
        
        if((phoneError == true)){
            return true;
        }else{
            return false;
        }
    });
});