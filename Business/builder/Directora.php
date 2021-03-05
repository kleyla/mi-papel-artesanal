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

    public function construirAgenda($tipo, $color, $colorAnillos)
    {
        $this->builder->buildCubierta($tipo);
        $this->builder->buildPerforado(true);
        $this->builder->buildAnillado($colorAnillos);
        $this->builder->buildDecoracion();
        $this->builder->buildImagen("2021.svg", $color, $tipo, $colorAnillos);
    }
    public function construirAlbum($color, $tipoPegamento)
    {
        $this->builder->buildCubierta("carton");
        $this->builder->buildEncuadernado(true);
        $this->builder->buildPegado($tipoPegamento);
        $this->builder->buildDecoracion();
        $this->builder->buildImagen("imagenes.svg", $color, "carton", "");
    }
}
