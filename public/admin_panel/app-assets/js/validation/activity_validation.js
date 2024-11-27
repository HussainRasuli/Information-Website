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
        }else if(data != ''){
            $('.photo-error').hide();
            PhotoError = true;
        }
    }

    $('.submit_btn').click(function(){
        Photo();
        Title();

        if((PhotoError == true) && (TitleError == true)){
            return true;
        }else{
            return false;
        }
    });
});