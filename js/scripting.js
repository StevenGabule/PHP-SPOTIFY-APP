jQuery(document).ready(function() {
    $("#hideLogin").click(function() {
        $("#login-form").hide();
        $("#register-form").show();
    });
    $("#hideRegister").click(function() {
       $("#login-form").show();
        $("#register-form").hide();
    });
});