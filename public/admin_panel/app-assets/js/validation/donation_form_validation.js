$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/; 

    let FirstNameError = true;
    $('.first-name').keyup(function () {
        firstName();
    });

    function firstName() {
        let data = $('.first-name').val();
        if (data == '') {
            $('.firstname-error').show();
            FirstNameError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.firstname-error').show();
            $('.firstname-error').html('First Name Must Be Greter Than 2 Characters.!');
            FirstNameError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.firstname-error').show();
            $('.firstname-error').html('Only alphabets are allowed.!');
            FirstNameError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('.firstname-error').show();
            $('.firstname-error').html('Only alphabets are allowed.!');
            FirstNameError = false;
            return false;
        } else {
            $('.firstname-error').hide();
            FirstNameError = true;
        }
    }


    let LastNameError = true;
    $('.last-name').keyup(function () {
        lastName();
    });

    function lastName() {
        let data = $('.last-name').val();
        if (data == '') {
            $('.lastname-error').show();
            LastNameError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.lastname-error').show();
            $('.lastname-error').html('Last Name Must Be Greter Than 2 Characters.!');
            LastNameError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.lastname-error').show();
            $('.lastname-error').html('Only alphabets are allowed.!');
            LastNameError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('.lastname-error').show();
            $('.lastname-error').html('Only alphabets are allowed.!');
            LastNameError = false;
            return false;
        } else {
            $('.lastname-error').hide();
            LastNameError = true;
        }
    }


    let CountryError = true;
    $('.country').keyup(function () {
        Country();
    });

    function Country() {
        let data = $('.country').val();
        if (data == '') {
            $('.country_error').show();
            CountryError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.country_error').show();
            $('.country_error').html('Country Name Must Be Greter Than 2 Characters.!');
            CountryError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.country_error').show();
            $('.country_error').html('Only alphabets are allowed.!');
            CountryError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('.country_error').show();
            $('.country_error').html('Only alphabets are allowed.!');
            CountryError = false;
            return false;
        } else {
            $('.country_error').hide();
            CountryError = true;
        }
    }


    let CityError = true;
    $('.city').keyup(function () {
        City();
    });

    function City() {
        let data = $('.city').val();
        if (data == '') {
            $('.city_error').show();
            CityError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.city_error').show();
            $('.city_error').html('City Name Must Be Greter Than 2 Characters.!');
            CityError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.city_error').show();
            $('.city_error').html('Only alphabets are allowed.!');
            CityError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('.city_error').show();
            $('.city_error').html('Only alphabets are allowed.!');
            CityError = false;
            return false;
        } else {
            $('.city_error').hide();
            CityError = true;
        }
    }


    let AddressError = true;
    $('.address').keyup(function () {
        Address();
    });

    function Address() {
        let data = $('.address').val();
        if (data == '') {
            $('.address_error').show();
            AddressError = false;
            return false;
        } else if ((data.length < 2)) {
            $('.address_error').show();
            $('.address_error').html('Father Name Must Be Greter Than 2 Characters.!');
            AddressError = false;
            return false;
        } else if($.isNumeric(data)){
            $('.address_error').show();
            $('.address_error').html('Only alphabets are allowed.!');
            AddressError = false;
            return false;
        } else {
            $('.address_error').hide();
            AddressError = true;
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
            $('.email-error').show();
            emailError = false;
            return false;
        }
        else if(!regex.test(emailValue)){
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


    let Zip_Code_Error = true;
    $('.zip-code').keyup(function () {
        ZipCode();
    });

    function ZipCode() {
        let phone = $('.zip-code').val();
        if (phone == '') {
            $('.zip-code-error').show();
            Zip_Code_Error = false;
            return false;
        } else if ((phone.length <= 1) || (phone.length >= 16)) {
            $('.zip-code-error').show();
            $('.zip-code-error').html('Zip Code Between 2 To 15 Digits.');
            Zip_Code_Error = false;
            return false;
        } else {
            $('.zip-code-error').hide();
            Zip_Code_Error = true;
        }
    }


    let Donate_Section_Error = true;
    $('.donate_section').change(function () {
        DonateSection();
    });

    function DonateSection() {
        let position = $('.donate-section').val();
        if (position == '') {
            $('.donate-section-error').show();
            Donate_Section_Error = false;
            return false;
        } else {
            $('.donate-section-error').hide();
            Donate_Section_Error = true;
        }
    }


    $('.donate_btn').click(function(){
        firstName();
        lastName();
        Country();
        ZipCode();
        Email();
        Phone();
        City();
        Address();
        DonateSection();
        Amount();
    
        if((FirstNameError == true) && (LastNameError == true) && (CountryError == true) && (Zip_Code_Error == true) && (emailError == true) && (phoneError == true) && (CityError == true) && (AddressError == true) && (Donate_Section_Error == true)){
            return true;
        }else{
            return false;
        }
    });
});