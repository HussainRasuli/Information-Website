
$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/;


    let emailError = true;
    $('.email').keyup(function(){
        Email();
    });
    function Email(){
        let emailValue = $('.email').val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(emailValue == ''){
            $('.email-error').show();
            emailError = false;
            return false;
        }else if((emailValue.length < 1) || (emailValue.length > 60)){
            $('.email-error').show();
            $('.email-error').html('Email Between 1 And 60 Characters');
            emailError = false;
            return false;
        }else if(!regex.test(emailValue)){
            $('.email-error').show();
            $('.email-error').html('Invalid E-mail Address');
            emailError = false;
            return false;
        }else if($.isNumeric(emailValue)){
            $('.email-error').show();
            $('.email-error').html('Only characters are allowed.!');
            emailError = false;
            return false;
        }else{
            $('.email-error').hide();
            emailError = true;
        }
    }



    $('.submit_btn').click(function(){
        Email();
                
        if((emailError == true)){
            return true;
        }else{
            return false;
        }
    });
});