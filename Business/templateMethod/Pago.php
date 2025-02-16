<?php

abstract class Pago
{
    const CLAVES = [
        array("clave" => "MARCH2021", "descuento" => 0.2)
    ];
    const COSTO_ENVIO = 10;

    final public function realizarPago($datos, $cupon, $monto, $cantidad)
    {
        $resultado["inicio"] = $this->inicializar();
        $descuentoCupon =   $this->verificarCupon($cupon);

        $costoEnvio = $this->calcularMontoEnvio($cantidad);

        $parcial = $this->calcularParcial($monto, $cantidad);

        $resultado["total"] = $this->calcularTotal($parcial, $descuentoCupon, $costoEnvio);
        $resultado["verificacion"] = $this->verificarMetodo($datos);
        $resultado["transaccion"] = $this->realizarTransaccion();
        return $resultado;
    }
    protected function inicializar()
    {
        return "Inicializando pago...";
    }
    protected function verificarCupon($clave)
    {
        if ($clave != "") {
            for ($i = 0; $i < count(self::CLAVES); $i++) {
                if (self::CLAVES[$i]["clave"] === $clave) {
                    return self::CLAVES[$i]["descuento"];
                }
            }
        }
        return 0;
    }
    protected function calcularParcial($monto, $cantidad)
    {
        return doubleval($monto) * intval($cantidad);
    }
    protected function calcularMontoEnvio($cantidad)
    {
        return self::COSTO_ENVIO * $cantidad;
    }

    abstract protected function calcularTotal($monto, $descuento, $costoEnvio);

    abstract protected function verificarMetodo($datos);

    abstract protected function realizarTransaccion();
}
