<?php
require_once("Business/templateMethod/PapelBond.php");
require_once("Business/templateMethod/PapelArtesanal.php");
require_once("Business/templateMethod/PapelPeriodico.php");

require_once("Business/templateMethod/Pago.php");
require_once("Business/templateMethod/Tarjeta.php");
require_once("Business/templateMethod/Paypal.php");
require_once("Business/templateMethod/Bitcoin.php");

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

    // Template Method

    public function papelBond()
    {
        $cantidadPapelBond = doubleval($_POST['cantidadPapelBond']);
        if ($cantidadPapelBond > 0) {
            $result = $this->getResultados(new PapelBond(), $cantidadPapelBond);
            // dep($result);
            $arrResponse = array('status' => true, 'data' => $result);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        } else {
            $arrResponse = array('status' => false);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    public function papelPeriodico()
    {
        $cantidadPapelPeriodico = doubleval($_POST['cantidadPapelPeriodico']);
        if ($cantidadPapelPeriodico > 0) {
            $result = $this->getResultados(new PapelPeriodico(), $cantidadPapelPeriodico);
            // dep($result);
            $arrResponse = array('status' => true, 'data' => $result);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        } else {
            $arrResponse = array('status' => false);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    private function getResultados(PapelArtesanal $papel, $cantidad)
    {
        return $papel->prepararPapelArtesanal($cantidad);
    }

    // Builder

    public function getAgenda()
    {
        $tipoCubierta = strClean($_POST['tipoCubierta']);
        $colorCubierta = strClean($_POST["colorCubierta"]);
        $colorAnillos = strClean($_POST["colorAnillos"]);
        if ($tipoCubierta != "" && $colorCubierta != "" && $colorAnillos != "") {
            $data = $this->makeAgenda($tipoCubierta, $colorCubierta, $colorAnillos);

            $arrResponse = array('status' => true, 'data' => $data);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        } else {
            $arrResponse = array('status' => false);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    private function makeAgenda($tipo, $color, $colorAnillos)
    {
        $directora = new Directora();
        $builder = new AgendaBuilder();
        $directora->setBuilder($builder);
        $directora->construirAgenda($tipo, $color, $colorAnillos);

        $agenda = $builder->getProducto()->listar();
        return $agenda;
    }

    public function getAlbum()
    {
        $colorCubierta = strClean($_POST["colorCubiertaAlbum"]);
        $tipoPegamento = strClean($_POST["tipoPegamento"]);
        if ($colorCubierta != "" && $tipoPegamento != "") {
            $data = $this->makeAlbum($colorCubierta, $tipoPegamento);

            $arrResponse = array('status' => true, 'data' => $data);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        } else {
            $arrResponse = array('status' => false);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    private function makeAlbum($color, $tipoPegamento)
    {
        $directora = new Directora();
        $builder = new AlbumBuilder();
        $directora->setBuilder($builder);
        $directora->construirAlbum($color, $tipoPegamento);

        $album = $builder->getProducto()->listar();
        return $album;
    }

    public function tarjeta()
    {
        $datos["nro"] = 12345678;
        $monto = 20;
        $cupon = "MARCH2021";
        $cantidad = 2;
        $response = $this->getResponse(new Tarjeta(), $datos, $monto, $cupon, $cantidad);
        dep($response);
    }
    public function paypal()
    {
        $datos["nro"] = 23456789;
        $monto = 20;
        $cupon = "MARCH20211";
        $cantidad = 2;
        $response = $this->getResponse(new Paypal(), $datos, $monto, $cupon, $cantidad);
        dep($response);
    }
    public function bitcoin()
    {
        $datos["nro"] = 345678912;
        $monto = 20;
        $cupon = "MARCH20211";
        $cantidad = 2;
        $response = $this->getResponse(new Bitcoin(), $datos, $monto, $cupon, $cantidad);
        dep($response);
    }

    private function getResponse(Pago $pago, $datos, $monto, $cupon, $cantidad)
    {
        return $pago->realizarPago($datos, $cupon, $monto, $cantidad);
    }
}
