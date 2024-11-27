
$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/; 

    let TitleError = true;
    $('.title').keyup(function () {
        Title();
    });

    function Title() {
        let data = $('.title').val();
        if (data == '') {
            $('.title-error').show();
            TitleError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.title-error').show();
            $('.title-error').html('Title Must Be Greter Than 2 Characters.!');
            TitleError = false;
            return false;
        } else {
            $('.title-error').hide();
            TitleError = true;
        }
    }



    let MessageError = true;
    $('.message').keyup(function () {
         Message();
    });

    function Message() {
        let data = $('.message').val();
        if (data == '') {
            $('.message-error').show();
            MessageError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.message-error').show();
            $('.message-error').html('Message Must Be Greter Than 2 Characters.!');
            MessageError = false;
            return false;
        } else {
            $('.message-error').hide();
            MessageError = true;
        }
    }

    $('.submit_btn').click(function(){
        Title();
        Message();
        
        if((TitleError == true) && (MessageError == true)){
            return true;
        }else{
            return false;
        }
    });
});