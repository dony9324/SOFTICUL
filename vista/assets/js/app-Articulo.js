$(document).ready(function() {
 /*cactura el evento del formulario */
    $("#loginForm").bind("submit", function() {
 +
        $.ajax({
			/*cacturamos el metodo*/
            type: $(this).attr("method"),
			/**/
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm button[type=submit]").html("Gardando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Se guardo nuevo articulo correctamente",
                        callback: function() {
                            window.location.href = "nuevoArticulo.php";
							$("#loginForm button[type=submit]").html("Gardar");
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Algo salio mal!"
                    });
                }

                $("#loginForm button[type=submit]").html("Guardar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Algo salio mal!"
                });

                $("#loginForm button[type=submit]").html("Guardar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });
/*cansela el envio del formulario*/
        return false;
    });

});