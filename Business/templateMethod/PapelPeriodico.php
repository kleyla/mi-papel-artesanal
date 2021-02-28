<?php
require_once("Business/templateMethod/PapelArtesanal.php");

class PapelPeriodico extends PapelArtesanal
{

    protected function agregarDecorativos(): string
    {
        return "Agregar decorativos a periodico: Se podria agregar hojitas de flores secas...";
    }
    protected function dejarSecar(): string
    {
        return "Dejamos secar el papel por 12 horas...";
    }
}
