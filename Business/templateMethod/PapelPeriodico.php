<?php
require_once("Business/templateMethod/PapelArtesanal.php");

class PapelPeriodico extends PapelArtesanal
{

    protected function limpiarPapel(): string
    {
        return "Limpiamos el papel, de cintas adhesiva u otros...";
    }
    protected function agregarDecorativos(): string
    {
        return "Agregar decorativos al periodico: Se podria agregar hojitas de flores secas...";
    }
    protected function dejarSecar(): string
    {
        return "Dejamos secar por 12 horas al aire libre...";
    }
}
