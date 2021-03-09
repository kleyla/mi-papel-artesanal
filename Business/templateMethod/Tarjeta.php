<?php
require_once("Business/templateMethod/Pago.php");

class Tarjeta extends Pago
{
    const DESCUENTO = 0;

    protected function calcularTotal($parcial, $descuentoCupon, $costoEnvio)
    {
        return (($parcial * (1 - self::DESCUENTO)) * (1 - $descuentoCupon)) + $costoEnvio;
    }

    protected function verificarMetodo($datos)
    {
        return "Verificando datos de la tarjeta " . $datos["nro"] . "...";
    }

    protected function realizarTransaccion()
    {
        return "Realizando transaccion con la tarjeta";
    }
}
