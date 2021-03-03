<?php
require_once("Business/templateMethod/PapelBond.php");
require_once("Business/templateMethod/PapelArtesanal.php");
require_once("Business/templateMethod/PapelPeriodico.php");

require_once("Business/builder/Directora.php");
require_once("Business/builder/AgendaBuilder.php");
require_once("Business/builder/AlbumBuilder.php");

class Home extends Business
{
    public function home()
    {
        // echo "here";
        $data["script"] = "home/script.js";
        $this->getView("home/index", $data);
    }

    // Template Methd

    public function papelBond()
    {
        $result = $this->getResultados(new PapelBond());
        // dep($result);
        $arrResponse = array('status' => true, 'data' => $result);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    public function papelPeriodico()
    {
        $result = $this->getResultados(new PapelPeriodico());
        // dep($result);
        $arrResponse = array('status' => true, 'data' => $result);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    public function getResultados(PapelArtesanal $papel)
    {
        return $papel->prepararPapelArtesanal();
    }

    // Builder

    public function makeAgenda($tipo, $color)
    {
        $directora = new Directora();
        $builder = new AgendaBuilder();
        $directora->setBuilder($builder);
        $directora->makeCubierta($tipo);
        // $directora->makeEncuadernado(false);
        $directora->makePerforado(true);
        $directora->makeAnillado();
        $directora->makeDecoracion();
        $directora->makeImage("2021.svg", $color, $tipo);
        $agenda = $builder->getProducto()->listar();
        return $agenda;
    }
    public function getAgenda()
    {
        $tipoCubierta = strClean($_POST['tipoCubierta']);
        $colorCubierta = strClean($_POST["colorCubierta"]);
        if ($tipoCubierta != "" && $colorCubierta != "") {
            $data = $this->makeAgenda($tipoCubierta, $colorCubierta);

            $arrResponse = array('status' => true, 'data' => $data);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        } else {
            $arrResponse = array('status' => false);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function makeAlbum($tipo, $color)
    {
        $directora = new Directora();
        $builder = new AlbumBuilder();
        $directora->setBuilder($builder);
        $directora->makeCubierta($tipo);
        $directora->makeEncuadernado(true);
        $directora->makePegado();
        $directora->makeDecoracion();
        $directora->makeImage("imagenes.svg", $color, $tipo);
        $album = $builder->getProducto()->listar();
        return $album;
    }
    public function getAlbum()
    {
        $tipoCubierta = strClean($_POST['tipoCubiertaAlbum']);
        $colorCubierta = strClean($_POST["colorCubiertaAlbum"]);
        if ($tipoCubierta != "" && $colorCubierta != "") {
            $data = $this->makeAlbum($tipoCubierta, $colorCubierta);

            $arrResponse = array('status' => true, 'data' => $data);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        } else {
            $arrResponse = array('status' => false);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
}
