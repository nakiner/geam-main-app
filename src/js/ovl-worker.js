$(document).ready(function()
{
    $('#form-login').click(function()
    {
        $.post("/user/login",
        {
            'login-username': $('#login-username').val(),
            'login-password': $('#login-password').val()
        },
        function(result) { $('#responseResult-1').html(result); });
    });
    $('#form-register').click(function()
    {
        $.post("/user/register",
        {
            'register-username': $('#register-username').val(),
            'register-name': $('#register-name').val(),
            'register-email': $('#register-email').val(),
            'register-password': $('#register-password').val(),
            'register-password-1': $('#register-password-1').val()
        },
        function(result) { $('#responseResult-2').html(result);} );
    });
    $('#form-restore').click(function()
    {
        $.post("/user/restore",
        {
            'restore-username': $('#restore-username').val(),
            'restore-email': $('#restore-email').val()
        },
        function(result) { $('#responseResult-3').html(result);} );
    });
});