
$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/;

    
    let ItemError = true;
    $('.item').keyup(function () {
         Item();
    });
    function Item() {
        let data = $('.item').val();
        if (data == '') {
            $('.item-error').show();
            ItemError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.item-error').show();
            $('.item-error').html('Item Must Be Greter Than 2 Characters.!');
            ItemError = false;
            return false;
        } else {
            $('.item-error').hide();
            ItemError = true;
        }
    }


    $('.submit_btn').click(function(){
        Item();
        
        if((ItemError == true)){
            return true;
        }else{
            return false;
        }
    });
});