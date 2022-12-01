<?php

include "autoload.php";
/*
include_once("ProyectoVideoClub\Soporte.php");
include_once("ProyectoVideoClub\CintaVideo.php");
include_once("ProyectoVideoClub\Dvd.php");
include_once("ProyectoVideoClub\Juego.php");
include_once("ProyectoVideoClub\Resumible.php");
*/
use const Dwes\ProyectoVideoclub\IVA;
use \Dwes\ProyectoVideoclub\Soporte;
use \Dwes\ProyectoVideoclub\Juego;

$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
$miJuego->muestraResumen();
?>