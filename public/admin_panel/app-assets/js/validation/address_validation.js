
$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/;

    
    let AddressError = true;
    $('.address').keyup(function () {
         Address();
    });
    function Address() {
        let data = $('.address').val();
        if (data == '') {
            $('.address-error').show();
            AddressError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.address-error').show();
            $('.address-error').html('Address Must Be Greter Than 2 Characters.!');
            AddressError = false;
            return false;
        } else {
            $('.address-error').hide();
            AddressError = true;
        }
    }


    $('.submit_btn').click(function(){
        Address();
        
        if((AddressError == true)){
            return true;
        }else{
            return false;
        }
    });
});