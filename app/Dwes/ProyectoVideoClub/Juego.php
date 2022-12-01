<?php
namespace Dwes\ProyectoVideoclub;

class Juego extends Soporte {
    public $consola;
    private $minNumJugadores,$maxNumJugadores;

    public function __construct($titulo, $numero, $precio,$consola,$minNumJugadores,$maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola=$consola;
        $this->minNumJugadores=$minNumJugadores;
        $this->maxNumJugadores=$maxNumJugadores;
    }

    public function muestraJugadoresPosibles(){
        echo "<br>";
        if ($this->minNumJugadores == 1)
            return "Para un jugador";
        if ( $this->minNumJugadores == $this->maxNumJugadores)
            return "Para ".$this->minNumJugadores ;
        else
            return "De ".$this->minNumJugadores. " a ".$this->maxNumJugadores;
    }

    public function muestraResumen()
    {
    echo "<br>Juego para: " .$this->consola;
        echo  parent::muestraResumen() . " <br>". $this->muestraJugadoresPosibles();
    }

}

?>
