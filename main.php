<?php
session_start();

if (isset($_GET['salir'])) {
    //Cerrar Sesión
    session_destroy();
    unset($_SESSION['usuario']);

    if( isset($_COOKIE['usuario']) )
    {
        setcookie("usuario", "", 0 );
    }

    if( isset($_COOKIE['contrasena']) )
    {
        setcookie("contrasena", "", 0 );
    }
    if( isset($_COOKIE['fecha']) )
    {
        setcookie("fecha", "", 0 );
    }

    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de registro</title>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body>


<div class="content">

    <!-- logueado -->
    <?php  if (isset($_SESSION['usuario'])) : ?>
        <p>Bienvenido <strong><?php echo $_SESSION['usuario']; ?></strong>


        </p>

        <p>
            <a class="btn" href="main.php?salir='1'">Cerrar Sesión</a>

        </p>
    <?php endif ?>
</div>

</body>
</html>

