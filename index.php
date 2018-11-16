<?php include 'vista/partials/head.php';
?>
<?php
if (isset($_SESSION["usuario"])) {
    header("location:vista/usuario.php");
} else {
    header("location:vista/login.php");
}
?>
