$(document).ready(function() {
 /*cactura el evento del formulario */
    $("#loginForm").bind("submit", function() {
 +
        $.ajax({
			/*cacturamos el metodo*/
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm button[type=submit]").html("enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo...",
                        callback: function() {
                            window.location.href = "admin.php";
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o password incorrecto!"
                    });
                }

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function(response) {
                $("body").overhang({
                    type: "error",
                    message: "Hubo un error!"
                });

                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo...",
                        callback: function() {
                            window.location.href = "admin.php";
                        }
                    });
                }

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });
/*cansela el envio del formulario*/
        return false;
    });

});
