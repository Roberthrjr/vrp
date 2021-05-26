<?php

require_once "../controlador/vacunas.controlador.php";
require_once "../modelo/vacunas.modelo.php";

// SE CREA LA CLASE AJAX VACUNAS
class AjaxVacunas{

 

    /*=============================================
    GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
    =============================================*/
    public $idFarmaceutica;

    public function ajaxCrearCodigoVacuna(){
  
      $item = "farmaceutica_idfarmaceutica";
      $valor = $this->idFarmaceutica;
  
      $respuesta = ControladorVacunas::ctrMostrarVacunas($item, $valor);
  
      echo json_encode($respuesta);
  
    }

    // SE CREA LA VARIABLE PUBLICA IDVACUNA
    public $idVacuna;
    // SE CREA EL METODO AJAX EDITAR VACUNA
    public function ajaxEditarVacuna(){

        $item = "idvacuna";
        
        $valor = $this->idVacuna;

        $respuesta = ControladorVacunas::ctrMostrarVacunas($item,$valor);

        echo json_encode($respuesta);

    }

}

// GENERAR CODIGO A PARTIR DE ID FARMACEUTICA
if(isset($_POST["idFarmaceutica"])){

    $codigoVacunas = new ajaxVacunas();

    $codigoVacunas -> idFarmaceutica = $_POST["idFarmaceutica"];
    
    $codigoVacunas -> ajaxCrearCodigoVacuna();
  
}

// INSTACIA DE LA CLASE AJAX
if(isset($_POST["idVacuna"])){

    $vacuna = new AjaxVacunas();

    $vacuna -> idVacuna = $_POST["idVacuna"];
    
    $vacuna -> ajaxEditarVacuna();
    
}