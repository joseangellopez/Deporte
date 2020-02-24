console.log("Entra al ajax");
$('#submitBtnLogin').click(function () {
    console.log("Entra al ajax click");
    var username = $('#username').val();
    var password = $('#password').val();
        console.log(username);
        $.ajax({
            url: "assets/gets/getlogin.php",
            type: "POST",
            data: {username: username, password: password},
            success: function (data) {
                alert(data);
                if (data == 'No') {
                    document.getElementsByClassName("mensaje").text("Error en usuario o contraseña");
                    console.log("ajax no login");
                } else {
                    console.log("ajax login");
                    $('#myModallogin').hide();
                    location.reload();

                }
            }
        });
});

/*
$('#logout').click(function () {
    var action = "logout";
    $.ajax({
        url: "assets/gets/getlogin.php",
        method: "POST",
        data: {action: action},
        success: function () {
            location.reload();
        }
    });
});*/