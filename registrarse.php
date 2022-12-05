<?php include('login.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body style="background-color:lightblue">


<form method="post" action="registrarse.php">

    <div class="contenedor">
        <label>Usuario</label>
        <input type="text" name="usuario" ">
    </div>
    <div class="contenedor">
        <label>Contraseña</label>
        <input type="password" name="contrasenaUno">
    </div>
    <div class="contenedor">
        <label>Confirme contraseña</label>
        <input type="password" name="contrasenaDos">
    </div>
    <div class="contenedor">
        <button type="submit" class="btn" name="registroUsuarioNuevo">Registrarse</button>
    </div>
    <p>
        ¿Tienes ya una cuenta creada? <a href="index.php">Acceder</a>
    </p>
</form>
</body>
</html>

