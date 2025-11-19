//AJAX

$('[name="Benutzername"]').keyup(function(e){
    if ($('[name="Benutzername"]').val().length > 5) {
        var username = $('[name="Benutzername"]').val();
        $.post('../hidden/models/func.checkForRegister.php', {'Benutzername':username}, function(data) {
            $("#checkUsername").html(data);

        });
    };
});

$('[name="Benutzername"]').blur(function(e){
    var username = $('[name="Benutzername"]').val();
    var usernameBlur = "1";
    $.post('../hidden/models/func.checkForRegister.php', {'Benutzername':username, 'usernameBlur':usernameBlur}, function(data) {
        $("#checkUsername").html(data);
    });
});
    
$('[name="Email"]').keyup(function(e){
    if ($('[name="Email"]').val().length > 5) {
        var email = $('[name="Email"]').val();
        $.post('../hidden/models/func.checkForRegister.php', {'Email':email}, function(data) {
            $("#checkEmail").html(data);
        });
    };
});

$('[name="Email"]').blur(function(e){
    if ($('[name="Email"]').val().length > 5) {
        var email = $('[name="Email"]').val();
        var emailBlur = "1";
        $.post('../hidden/models/func.checkForRegister.php', {'Email':email, 'emailBlur':emailBlur}, function(data) {
            $("#checkEmail").html(data);
            if ($('#checkEmail span').hasClass('fail')) {
                $('[name="Email"]').focus();
            };
        });
    };
});

$('[name="clearPasswortWiederholung"]').blur(function(e){
    var passwdwd = $('[name="clearPasswortWiederholung"]').val();
    var passwd = $('[name="clearPasswort"]').val();
    if (passwd === passwdwd) {
        $('#checkPassword').html('<span class="checkReg ok" />');
        $('#checkPasswordWD').html('<span class="checkReg ok" />');
    } else {
        $('#checkPassword').html('<span class="checkReg fail" /><span class=messagespan>Die Passworteingaben stimmen nicht überein.</span>');
        $('#checkPasswordWD').html('<span class="checkReg fail" />');
    }
});