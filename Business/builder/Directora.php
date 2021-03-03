<?php
require_once("Business/builder/Builder.php");

class Directora
{
    private $builder;

    public function __construct()
    {
        // echo "Directora";
    }

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function makeCubierta($tipo)
    {
        $this->builder->buildCubierta($tipo);
    }
    public function makeEncuadernado($encuadernacion)
    {
        $this->builder->buildEncuadernado($encuadernacion);
    }
    public function makePerforado($perforacion)
    {
        $this->builder->buildPerforado($perforacion);
    }
    public function makeAnillado($colorAnillos)
    {
        $this->builder->buildAnillado($colorAnillos);
    }
    public function makePegado($tipoPegamento)
    {
        $this->builder->buildPegado($tipoPegamento);
    }
    public function makeImage($imagen, $color, $tipo, $colorAnillos = "")
    {
        $this->builder->buildImage($imagen, $color, $tipo, $colorAnillos);
    }
    public function makeDecoracion()
    {
        $this->builder->buildDecoracion();
    }
}
