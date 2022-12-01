<?php


include_once("ProyectoVideoclub\Soporte.php");
include_once("ProyectoVideoclub\CintaVideo.php");
include_once("ProyectoVideoclub\Dvd.php");
include_once("ProyectoVideoclub\Juego.php");
include_once("ProyectoVideoclub\Resumible.php");

use const Dwes\ProyectoVideoclub\IVA;
use \Dwes\ProyectoVideoclub\Soporte;
use \Dwes\ProyectoVideoclub\Juego;

$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
$miJuego->muestraResumen();
?>