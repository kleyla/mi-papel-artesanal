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
        $this->agenda->partes[] = '<p><b>Tipo de cubierta:</b><br>' . $tipo . '</p>';
    }
    public function buildEncuadernado($encuadernacion)
    {
        if ($encuadernacion) {
            $this->agenda->partes[] = '<p><b>Encuadernado:</b><br>Para el encuadernado realizamos un proceso de cosido de hojas</p>';
        }
    }
    public function buildPerforado($perforacion)
    {
        if ($perforacion) {
            $this->agenda->partes[] = '<p><b>Perforado:</b><br>Necesitamos un perforador y realizamos los hoyos de la manera que nos guste</p>';
        }
    }
    public function buildAnillado($colorAnillos)
    {
        $this->agenda->partes[] = '<p><b>Anillado:</b><br>Para la unión de nuestras tapas y las hojas necesitamos unos aros de color ' . $colorAnillos . ', y procedemos a anillarlo</p>';
    }
    public function buildPegado($tipoPegamento)
    {
        $this->agenda->partes[] = '<p><b>Pegado:</b><br>Para la unión de nuestras tapas y las hojas necesitamos pegamento ' . $tipoPegamento . ' y dejarlos secar.</p>';
    }
    public function buildDecoracion()
    {
        $this->agenda->partes[] = '<p><b>Decoración:</b><br>Necesitaremos muchos colores.. además de la portada con nuestro nombre, podemos hacer secciones que nos gustaría como uno de contactos, hábitos, etc.</p>';
    }
    public function buildImagen($imagen, $color, $tipo, $colorAnillos)
    {
        $this->agenda->partes[] = '<div class="book bg-' . $color . ' line-top-' . $tipo . ' line-' . $colorAnillos . '"><div class="book-cover"><h5>Mi agenda</h5><br><img src="' . BASE_URL . 'assets/imgs/' . $imagen . '" alt="Album" style="width: 150px;"></div>';
    }

    public function getProducto(): Agenda
    {
        $agenda = $this->agenda;
        $this->reset();
        return $agenda;
    }
}
