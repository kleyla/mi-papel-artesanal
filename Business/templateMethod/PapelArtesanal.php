<?php

abstract class PapelArtesanal
{
    /**
     * Template method
     */
    final public function prepararPapelArtesanal($kg)
    {
        $resultado = [];
        array_push($resultado, $this->limpiarPapel());
        array_push($resultado, $this->picarPapel());
        array_push($resultado, $this->remojarPapel($kg));
        array_push($resultado, $this->licuarPapel());
        array_push($resultado, $this->agregarDecorativos());
        array_push($resultado, $this->formarHojas($kg));
        array_push($resultado, $this->dejarSecar());
        return $resultado;
    }

    // Estas operaciones ya tienen implementacion

    /**
     * Limpieza del papel
     */
    protected function limpiarPapel()
    {
        return "Limpiamos el papel, es decir lo separamos de tapas, anillos de encuadernacion, cintas adhesiva...";
    }
    protected function picarPapel()
    {
        return "Picamos el papel en pequeños pedacitos...";
    }
    public function calcularAgua($kg)
    {
        $total = $kg * 5;
        return $total;
    }
    public function calcularHojas($kg)
    {
        return round($kg * 45);
    }
    /**Dejamos remojar el papel */
    protected function remojarPapel($kg)
    {
        return "Dejamos remojando el papel en " . $this->calcularAgua($kg) . " litros agua por todo un dia...";
    }
    /**
     * Licuamos el papel
     */
    protected function licuarPapel()
    {
        return "Si notamos que el papel aun no esta como pulpa, lo podemos licuar...";
    }

    /**Formamos el papel */
    protected function formarHojas($kg)
    {
        return "Formamos el papel con ayuda de los marcos de madera... nos saldran al rededor de " . $this->calcularHojas($kg) . " hojas";
    }
    /**Renderizar */
    protected function render()
    {
        return "Renderizando...";
    }

    // Estas operaciones seran implementadas en las subclases

    /**
     * Agregamos los decorativos
     */
    abstract protected function agregarDecorativos();

    /**
     * Dejamos secar el papel
     */
    abstract protected function dejarSecar();
}
