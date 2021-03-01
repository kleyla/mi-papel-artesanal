<?php
require_once("Business/builder/Agenda.php");
require_once("Business/builder/Builder.php");

class AgendaBuilder implements Builder
{
    private $agenda;

    public function __construct()
    {
        // echo "AgendaBuilder";
        $this->reset();
    }
    public function reset()
    {
        $this->agenda = new Agenda();
    }
    public function buildCubierta($tipo)
    {
        $this->agenda->partes[] = '<p><b>El tipo de cubierta es: </b>' . $tipo . '</p>';
    }
    public function buildEncuadernado($encuadernacion)
    {
        if ($encuadernacion) {
            $this->agenda->partes[] = '<p><b>Encuadernado</b><br>Para el encuadernado realizamos un proceso de cosido de hojas</p>';
        }
        
    }
    public function buildPerforado($perforacion)
    {
        if ($perforacion) {
            $this->agenda->partes[] = '<p><b>Perforado</b><br>Necesitamos un perforador y realizamos los hoyos de la manera que nos guste</p>';
        }
    }
    public function buildAnillado()
    {
        $this->agenda->partes[] = '<p><b>Anillado</b><br>Para la union de nuestras tapas y las hojas necesitamos unos aros, y procedemos a anillarlo</p>';
    }
    public function buildPegado()
    {
        $this->agenda->partes[] = '<p><b>Pegado</b><br>Para la union de nuestras tapas y las hojas necesitamos pegegarlos y dejarlos secar.</p>';
    }
    public function buildDecoracion()
    {
        $this->agenda->partes[] = '<p><b>Decoracion</b><br>Para decorar nuestra agenda necesitaremos muchos colores.. ademas de la portada con nuestro nombre, podemos hacer secciones que nos gustaria como uno de contactos, habitos, etc.</p>';
    }
    public function buildImage($imagen, $color)
    {
        $this->agenda->partes[] = '<div class="book bg-' . $color . '"><div class="book-cover"><h5>Mi agenda</h5><br><img src="' . BASE_URL . 'assets/imgs/' . $imagen . '" alt="Album" style="width: 150px;"></div>';
    }

    public function getProducto(): Agenda
    {
        $agenda = $this->agenda;
        $this->reset();
        return $agenda;
    }
}
