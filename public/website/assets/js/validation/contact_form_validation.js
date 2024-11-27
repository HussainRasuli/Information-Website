$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/; 

    let NameError = true;
    $('.name').keyup(function () {
        Name();
    });

    function Name() {
        let data = $('.name').val();
        if (data == '') {
            $('.contact-name-error').show();
            NameError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.contact-name-error').show();
            $('.contact-name-error').html('Name Must Be Greter Than 2 Characters.!');
            NameError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.contact-name-error').show();
            $('.contact-name-error').html('Only alphabets are allowed.!');
            NameError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('.contact-name-error').show();
            $('.contact-name-error').html('Only alphabets are allowed.!');
            NameError = false;
            return false;
        } else {
            $('.contact-name-error').hide();
            NameError = true;
        }
    }



    let emailError = true;
    $('.email').keyup(function(){
        Email();
    });
    function Email(){
        let emailValue = $('.email').val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(emailValue == ''){
            $('.contact-email-error').show();
            emailError = false;
            return false;
        }else if((emailValue.length < 2) || (emailValue.length > 60)){
            $('.contact-email-error').show();
            $('.contact-email-error').html('Email Between 2 And 60 Characters');
            emailError = false;
            return false;
        }else if(!regex.test(emailValue)){
            $('.contact-email-error').show();
            $('.contact-email-error').html('Invalid E-mail Address');
            emailError = false;
            return false;
        }else if($.isNumeric(emailValue)){
            $('.contact-email-error').show();
            $('.contact-email-error').html('Only characters are allowed.!');
            emailError = false;
            return false;
        }else{
            $('.contact-email-error').hide();
            emailError = true;
        }
    }


    let phoneError = true;
    $('.phone').keyup(function () {
        Phone();
    });

    function Phone() {
        let phone = $('.phone').val();
        if (phone == '') {
            $('.contact-phone-error').show();
            phoneError = false;
            return false;
        } else if ((phone.length <= 9) || (phone.length >= 16)) {
            $('.contact-phone-error').show();
            $('.contact-phone-error').html('Phone Number Between 10 To 15 Digits.');
            phoneError = false;
            return false;
        } else {
            $('.contact-phone-error').hide();
            phoneError = true;
        }
    }

    

    let SubjectError = true;
    $('.subject').keyup(function () {
        Subject();
    });

    function Subject() {
        let data = $('.subject').val();
        if (data == '') {
            $('.contact-subject-error').show();
            SubjectError = false;
            return false;
        } else if ((data.length < 1)) {
            $('.contact-subject-error').show();
            $('.contact-subject-error').html('Subject Must Be Greter Than 2 Characters.!');
            SubjectError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.contact-subject-error').show();
            $('.contact-subject-error').html('Only alphabets are allowed.!');
            SubjectError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('.contact-subject-error').show();
            $('.contact-subject-error').html('Only alphabets are allowed.!');
            SubjectError = false;
            return false;
        } else {
            $('.contact-subject-error').hide();
            SubjectError = true;
        }
    }


    let MessageError = true;
    $('.message').keyup(function () {
         Message();
    });

    function Message() {
        let data = $('.message').val();
        if (data == '') {
            $('.contact-message-error').show();
            MessageError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.contact-message-error').show();
            $('.contact-message-error').html('Message Must Be Greter Than 2 Characters.!');
            MessageError = false;
            return false;
        } else {
            $('.contact-message-error').hide();
            MessageError = true;
        }
    }

    $('.submit_btn').click(function(){
        Name();
        Email();
        Phone();
        Subject();
        Message();



        if((NameError == true)&& (emailError == true) && (phoneError == true) && (SubjectError == true) && (MessageError == true)){
            return true;
        }else{
            return false;
        }
    });
});