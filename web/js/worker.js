$(document).ready(function()
{
    $('#form-login').click(function() //login button clicked
    {
        $.post("/user/login",
        {
            'login-username': $('#login-username').val(),
            'login-password': $('#login-password').val()
        },
        function(result) { Form_Action(result, "#responseResult-1"); } );
    });
    $('#form-register').click(function() //register button clicked
    {
        $.post("/user/register",
        {
            'register-username': $('#register-username').val(),
            'register-name': $('#register-name').val(),
            'register-email': $('#register-email').val(),
            'register-password': $('#register-password').val(),
            'register-password-1': $('#register-password-1').val()
        },
        function(result) { Form_Action(result, "#responseResult-2"); } );
    });
    $('#form-restore').click(function() // restore button clicked
    {
        $.post("/user/restore",
        {
            'restore-username': $('#restore-username').val(),
            'restore-email': $('#restore-email').val()
        },
        function(result) { Form_Action(result, "#responseResult-3"); } );
    });
    $('#pwdchange').click(function()
    {
        $.post("/user/change/password",
        {
            'old-pwd': $('#old-pwd').val(),
            'new-pwd-1': $('#new-pwd-1').val(),
            'new-pwd-2': $('#new-pwd-2').val()
        },
        function(result) { Form_Action(result, "#result"); } );
    });
    $('#emailchange').click(function ()
    {
        $.post("/user/change/email",
        {
            'password': $('#password').val(),
            'email': $('#email').val()
        },
        function(result) { Form_Action(result, "#result"); } );
    });
    $('#newsAdd').click(function ()
    {
        $.post("/news/action/add",
        {
            'news-title': $('#news-title').val(),
            'news-text': $('#news-text').val()
        },
        function(result) { Form_Action(result, "#result"); } );
    });
    $('#newsEdit').click(function ()
    {
        $.post("/news/action/edit",
            {
                'password': $('#password').val(),
                'email': $('#email').val()
            },
            function(result) { Form_Action(result, "#result"); } );
    });
    function Form_Action(data, where)
    {
        if($(data).find('#alert-success').length > 0) setTimeout(function() { location.reload(); }, 3000);
        $(where).html(data);
    }
});