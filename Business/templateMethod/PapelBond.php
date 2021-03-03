<?php
require_once("Business/templateMethod/PapelArtesanal.php");

class PapelBond extends PapelArtesanal
{

    protected function agregarDecorativos(): string
    {
        return "Agregar decorativos a bond: Se puede agregar colores acrilicos como hojitas de flores secas...";
    }
    protected function dejarSecar(): string
    {
        return "Dejamos secar por 24 horas mejor si lo exponemos al sol...";
    }
}
