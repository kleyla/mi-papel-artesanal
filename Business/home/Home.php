<?php
require_once("Business/builder/Directora.php");
require_once("Business/templateMethod/PapelBond.php");
require_once("Business/templateMethod/PapelArtesanal.php");
require_once("Business/templateMethod/PapelPeriodico.php");

class Home extends Business
{
    public function home()
    {
        // echo "here";
        $data["script"] = "home/script.js";
        $this->getView("home/index", $data);
    }

    public function papelArtesanal()
    {
    }
    public function papelBond()
    {
        $result = $this->getResult(new PapelBond());
        // dep($result);
        $arrResponse = array('status' => true, 'data' => $result);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    public function papelPeriodico()
    {
        $result = $this->getResult(new PapelPeriodico());
        // dep($result);
        $arrResponse = array('status' => true, 'data' => $result);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    public function getResult(PapelArtesanal $papel)
    {
        return $papel->prepararPapelArtesanal();
    }
}
