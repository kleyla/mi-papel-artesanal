<?php
require_once("Business/builder/Builder.php");
require_once("Business/builder/Album.php");

class AlbumBuilder implements Builder
{
    private $album;

    public function __construct()
    {
        // echo "AlbumBuilder";
        $this->reset();
    }
    public function reset()
    {
        $this->album = new Album();
    }
    public function buildCubierta($tipo)
    {
        $this->album->partes[] = '<p><b>Tipo de cubierta:</b><br>' . $tipo . '</p>';
    }
    public function buildEncuadernado($encuadernacion)
    {
        if ($encuadernacion) {
            $this->album->partes[] = '<p><b>Encuadernado:</b><br>Para el encuadernado realizamos un proceso de cosido de hojas</p>';
        }
    }
    public function buildPerforado($perforacion)
    {
        if ($perforacion) {
            $this->album->partes[] = '<p><b>Perforado:</b><br>Necesitamos un perforador y realizamos los hoyos de la manera que nos guste</p>';
        }
    }
    public function buildAnillado($colorAnillos)
    {
        $this->album->partes[] = '<p><b>Anillado:</b><br>Para la union de nuestras tapas y las hojas necesitamos unos aros de color ' . $colorAnillos . ', y procedemos a anillarlo</p>';
    }
    public function buildPegado($tipoPegamento)
    {
        $this->album->partes[] = '<p><b>Pegado:</b><br>Para la union de nuestras tapas y las hojas necesitamos pegamento ' . $tipoPegamento . ' y dejarlos secar.</p>';
    }
    public function buildDecoracion()
    {
        $this->album->partes[] = '<p><b>Decoracion:</b><br>Para decorar nuestra albun necesitaremos decorar la portada y llenar con las imagenes que deseamos</p>';
    }
    public function buildImage($imagen, $color, $tipo, $colorAnillos)
    {
        $this->album->partes[] =  '<div class="book bg-' . $color . ' line-' . $tipo . '"><div class="book-cover"><h5>Mi album</h5><br><img src="' . BASE_URL . 'assets/imgs/' . $imagen . '" alt="Album" style="width: 150px;"></div>';
    }

    public function getProducto(): Album
    {
        $album = $this->album;
        $this->reset();
        return $album;
    }
}
