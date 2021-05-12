<?php

require_once "../controlador/vacunas.controlador.php";
require_once "../modelo/vacunas.modelo.php";

// SE CREA LA CLASE AJAX VACUNAS
class AjaxVacunas{

    // SE CREA LA VARIABLE PUBLICA IDVACUNA
    public $idVacuna;
    // SE CREA EL METODO AJAX EDITAR VACUNA
    public function ajaxEditarVacuna(){

        $item = "id";
        $valor = $this->idVacuna;

        $respuesta = ControladorVacunas::ctrMostrarVacunas($item,$valor);

        echo json_encode($respuesta);

    }

}

// INSTACIA DE LA CLASE AJAX
if(isset($_POST["idVacuna"])){

    $vacuna = new AjaxVacunas();

    $vacuna -> idVacuna = $_POST["idVacuna"];
    
    $vacuna -> ajaxEditarVacuna();
    
}