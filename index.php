<?php

// CONTROLADORES
require_once "controlador/plantilla.controlador.php";
require_once "controlador/farmaceutica.controlador.php";
require_once "controlador/hospital.controlador.php";
require_once "controlador/vacunas.controlador.php";
require_once "controlador/pacientes.controlador.php";
require_once "controlador/vacuna-has-hospital.controlador.php";

// MODELOS
require_once "modelo/farmaceutica.modelo.php";
require_once "modelo/hospital.modelo.php";
require_once "modelo/vacunas.modelo.php";
require_once "modelo/pacientes.modelo.php";
require_once "modelo/vacuna-has-hospital.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla(); 