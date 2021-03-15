<?php

// CONTROLADORES
require_once "controlador/plantilla.controlador.php";
require_once "controlador/farmaceutica.controlador.php";
require_once "controlador/hospital.controlador.php";

// MODELOS
require_once "modelo/farmaceutica.modelo.php";
require_once "modelo/hospital.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla(); 