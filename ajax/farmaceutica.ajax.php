<?php

require_once "../controlador/farmaceutica.controlador.php";
require_once "../modelo/farmaceutica.modelo.php";

// SE CREA LA CLASE AJAX FARMACEUTICA
class AjaxFarmaceuticas{

    // SE CREA LA VARIABLE PUBLICA IDFARMACEUTICA
    public $idFarmaceutica;
    // SE CREA EL METODO AJAX EDITAR FARMACEUTICA
    public function ajaxEditarFarmaceutica(){

        $item = "idfarmaceutica";
        $valor = $this->idFarmaceutica;

        $respuesta = ControladorFarmaceuticas::ctrMostrarFarmaceuticas($item,$valor);

        echo json_encode($respuesta);

    }

}

// INSTACIA DE LA CLASE AJAX
if(isset($_POST["idFarmaceutica"])){

    $farmaceutica = new AjaxFarmaceuticas();

    $farmaceutica -> idFarmaceutica = $_POST["idFarmaceutica"];
    
    $farmaceutica -> ajaxEditarFarmaceutica();
    
}