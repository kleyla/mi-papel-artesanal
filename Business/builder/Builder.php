<?php

// interfaz constructora
interface Builder
{
    public function reset();
    public function buildCubierta($tipo);
    public function buildEncuadernado($encuadernacion);
    public function buildPerforado($perforacion);
    public function buildAnillado();
    public function buildPegado();
    public function buildDecoracion();
    public function buildImage($imagen, $color, $tipo);
}
