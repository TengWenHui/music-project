/* Put all your JS and jQuery codes here */


$(document).ready(function() {

    $("#validateSubmit").click(function() {
        if (validateForm()) {
            $("#registerform").submit()
        }
    });


    function validateForm() {

        var extractedEmail = $("#email").val();
        var extractedPassword = $("#password").val();
        var extractedConfirmPassword = $("#confirm_password").val();

        if (extractedEmail == "") {
            alert("Email must not be empty!");
            return false
        } else if (!validateSubmit(extractedEmail)) {
            alert("Please Enter A Valid Email!");
        }

        if (extractedPassword == "") {
            alert("Password must not be empty!");
            return false
        } else if (extractedPassword.length < 8 || extractedPassword.length > 16) {
            alert("Password must be between 8-16 characters!");
            return false
        }

        if (extractedPassword != extractedConfirmPassword) {
            alert("Password not match!")
            return false
        }

        return true
    }

    function validateSubmit(str) {
        return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(str);
    }

});