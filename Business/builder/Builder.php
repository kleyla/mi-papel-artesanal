<?php

// interfaz constructora
interface Builder
{
    public function reset();
    public function buildCubierta($tipo);
    public function buildEncuadernado($encuadernacion);
    public function buildPerforado($perforacion);
    public function buildAnillado($colorAnillos);
    public function buildPegado($tipoPegamento);
    public function buildDecoracion();
    public function buildImagen($imagen, $color, $tipo, $colorAnillos);
}
