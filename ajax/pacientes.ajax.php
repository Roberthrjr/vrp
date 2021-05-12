<?php

require_once "../controlador/pacientes.controlador.php";
require_once "../modelo/pacientes.modelo.php";

// SE CREA LA CLASE AJAX VACUNAS
class AjaxPacientes{

    // SE CREA LA VARIABLE PUBLICA IDVACUNA
    public $idPaciente;
    // SE CREA EL METODO AJAX EDITAR VACUNA
    public function ajaxEditarPaciente(){

        $item = "id";
        $valor = $this->idPaciente;

        $respuesta = ControladorPacientes::ctrMostrarPacientes($item,$valor);

        echo json_encode($respuesta);

    }

}

// INSTACIA DE LA CLASE AJAX
if(isset($_POST["idPaciente"])){

    $paciente = new AjaxPacientes();

    $paciente -> idPaciente = $_POST["idPaciente"];
    
    $paciente -> ajaxEditarPaciente();
    
}