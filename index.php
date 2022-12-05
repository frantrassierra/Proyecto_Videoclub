<?php include_once('login.php')?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>


<form method="post" action="index.php">
    <div class="contenedor">
        <label>Usuario</label>
        <input type="text" name="usuario"  value="<?php
        if(isset($_COOKIE['usuario']))
            echo$_COOKIE['usuario'];
        ?>"
        >

    </div>

    <div class="contenedor">
        <label>Contraseña</label>
        <input type="password" name="contrasena" value="
<?php

        if(isset($_COOKIE['contrasena']))
            echo $_COOKIE['contrasena'];
        ?>"
">
    </div>
    <div>
        <label><a href="registrarse.php">Registrarse</a></label>
    </div>

    <div class="form-check">
        <input type="checkbox" name="recordar" id="recordar"/>
        <label for="recordar">Recordar</label>
    </div>

    <div class="contenedor">
        <button  type="submit" class="btn" name="inicioUsuario">Acceder</button>
    </div>

</form>

</body>
</html>