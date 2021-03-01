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
    public function makeAnillado()
    {
        $this->builder->buildAnillado();
    }
    public function makePegado()
    {
        $this->builder->buildPegado();
    }
    public function makeImage($imagen, $color, $tipo)
    {
        $this->builder->buildImage($imagen, $color, $tipo);
    }
    public function makeDecoracion()
    {
        $this->builder->buildDecoracion();
    }
}
