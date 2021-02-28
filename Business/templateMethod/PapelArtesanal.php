<?php

abstract class PapelArtesanal
{
    /**
     * Template method
     */
    final public function prepararPapelArtesanal()
    {
        $resultado = [];
        array_push($resultado, $this->limpiarPapel());
        array_push($resultado, $this->picarPapel());
        array_push($resultado, $this->remojarPapel());
        array_push($resultado, $this->licuarPapel());
        array_push($resultado, $this->agregarDecorativos());
        array_push($resultado, $this->formarHojas());
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
    public function picarPapel()
    {
        return "Picamos el papel en pequeños pedacitos...";
    }
    /**Dejamos remojar el papel */
    protected function remojarPapel()
    {
        return "Dejamos remojando el papel en abuntante agua por todo un dia...";
    }
    /**
     * Licuamos el papel
     */
    protected function licuarPapel()
    {
        return "Si notamos que el papel aun no esta como pulpa, lo podemos licuar...";
    }

    /**Formamos el papel */
    protected function formarHojas()
    {
        return "Formamos el papel con ayuda de los marcos de madera...";
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
