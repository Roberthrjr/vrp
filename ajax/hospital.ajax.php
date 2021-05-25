<?php

require_once "../controlador/hospital.controlador.php";
require_once "../modelo/hospital.modelo.php";

// SE CREA LA CLASE AJAX HOSPITAL
class AjaxHospitales{

    // SE CREA LA VARIABLE PUBLICA IDHOSPITAL
    public $idHospital;
    // SE CREA EL METODO AJAX EDITAR HOSPITAL
    public function ajaxEditarHospital(){

        $item = "idhospital";
        $valor = $this->idHospital;

        $respuesta = ControladorHospitales::ctrMostrarHospitales($item,$valor);

        echo json_encode($respuesta);

    }

}

// INSTACIA DE LA CLASE AJAX
if(isset($_POST["idHospital"])){

    $hospital = new AjaxHospitales();

    $hospital -> idHospital = $_POST["idHospital"];
    
    $hospital -> ajaxEditarHospital();
    
}