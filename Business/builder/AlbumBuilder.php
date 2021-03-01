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
        $this->album->partes[] = '<p><b>El tipo de cubierta es: </b>' . $tipo . '</p>';
    }
    public function buildEncuadernado($encuadernacion)
    {
        if ($encuadernacion) {
            $this->album->partes[] = '<p><b>Encuadernado: </b>Para el encuadernado realizamos un proceso de cosido de hojas</p>';
        }
    }
    public function buildPerforado($perforacion)
    {
        if ($perforacion) {
            $this->album->partes[] = '<p><b>Perforado: </b>Necesitamos un perforador y realizamos los hoyos de la manera que nos guste</p>';
        }
    }
    public function buildAnillado()
    {
        $this->album->partes[] = '<p><b>Anillado: </b>Para la union de nuestras tapas y las hojas necesitamos unos aros, y procedemos a anillarlo</p>';
    }
    public function buildPegado()
    {
        $this->album->partes[] = '<p><b>Pegado: </b>Para la union de nuestras tapas y las hojas necesitamos pegegarlos y dejarlos secar.</p>';
    }
    public function buildDecoracion()
    {
        $this->album->partes[] = '<p><b>Decoracion: </b>Para decorar nuestra albun necesitaremos decorar la portada y llenar con las imagenes que deseamos</p>';
    }
    public function buildImage($imagen, $color)
    {
        $this->album->partes[] =  '<div class="book bg-' . $color . '"><div class="book-cover"><h5>Mi album</h5><br><img src="' . BASE_URL . 'assets/imgs/' . $imagen . '" alt="Album" style="width: 150px;"></div>';
    }

    public function getProducto(): Album
    {
        $album = $this->album;
        $this->reset();
        return $album;
    }
}
