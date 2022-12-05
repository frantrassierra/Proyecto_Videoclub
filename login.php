<?php

session_start();
$usuario = "";
$file = "credenciales.txt";


//LOGEARSE
if (isset($_POST['inicioUsuario'])) {

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    if (isset($_POST['recordar'])){
        setcookie('usuario',$usuario,time()+60*60*24*90);
        setcookie('contrasena',$contrasena,time()+60*60*24*90);
    }



    if (empty($usuario) && empty( $contrasena)) {
        echo "<p class='error'> Debes introducir un usuario y contraseña</p>". "<br>";
    }

    if(file_exists($file)){
        $existe = false;
        $datosLectura = file($file);
        foreach($datosLectura as $line){
            $arreglo = explode(',', $line);
            if ($arreglo[0] == $usuario and trim($arreglo[1])==$contrasena){
                $existe=true;
                $usuario = $arreglo[0];
                $contrasena = $arreglo[1];

            }
        }
        if ($existe){
            $_SESSION['usuario'] = $usuario;
            header('location: main.php');
        }else{
            echo "<p class='error'>Datos incorrectos.</p>". "<br>";
        }
    } else{
        echo "<p class='error'>Archivo de lectura de usuarios y contraseñas no encontrados.</p>". "<br>";
    }
}


//REGISTRARSE
if (isset($_POST['registroUsuarioNuevo'])) {

    $usuario = $_POST['usuario'];
    $contrasenaUno = $_POST['contrasenaUno'];
    $contrasenaDos = $_POST['contrasenaDos'];

    $existe = true;

    if (empty($usuario)) {

        echo  "<p class='error'>El usuario es obligatoria</p>". "<br>";
        $existe = false;
    }
    if (empty($contrasenaUno)) {
        echo  "<p class='error'>La contraseña es obligatoria</p>". "<br>";


        $existe = false;}

    if ($contrasenaUno != $contrasenaDos) {
        echo  "<p class='error'>Error la contraseñas deben ser iguales</p>". "<br>";
        $existe = false;
    }

    if(file_exists($file)){
        $datosLectura = file($file);
        foreach($datosLectura as $line){
            $arreglo = explode(",", $line);
            if ($arreglo[0] == $usuario){
                echo  "<p class='error'>El usuario ya existe</p>". "<br>";
                $existe = false;
            }
        }
    } else{
        echo  "<p class='error'>Archivo no encontrado.</p>". "<br>";
    }

    if ($existe) {
        $data = "\n$usuario,$contrasenaUno";
        file_put_contents($file, $data, FILE_APPEND) or die("ERROR");
        header('location: index.php');
    }
}



?>