<?php

// SE CREA LA CLASE CONTROLADOR VACUNA
class ControladorCitas{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function ctrMostrarCitas($item,$valor){

        $tabla = "vacuna_has_hospital";

        $respuesta = ModeloCitas::mdlMostrarCitas($tabla,$item,$valor);

        return $respuesta;

    }

    // SE CREA EL METODO PARA CREAR VACUNA
    static public function ctrCrearCita(){

        if(isset($_POST["nuevaVacuna"])){

                    $tabla = "vacuna_has_hospital";

                    $datos = array( "vacuna_idvacuna"=>$_POST["nuevaVacuna"],
                                    "hospital_idhospital"=>$_POST["nuevoHospital"],
                                    "paciente_idpaciente"=>$_POST["nuevoPaciente"],
                                    "cantidad"=>$_POST["nuevaCantidad"],
                                    "ultima_cita"=>$_POST["nuevaCita"]);

                    $respuesta = ModeloCitas::mdlCrearCitas($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡La cita ha sido guardada correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'vacuna-has-hospital';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡La cita no ha sido guardada correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'vacuna-has-hospital';
                                        }
                                })
                                </script>";
                    }
        }
    }

    // SE CREA EL METODO PARA ELIMINAR VACUNAS
    static public function ctrEliminarCita(){

        if(isset($_GET["idCita"])){

            $tabla = "vacuna_has_hospital";

            $datos = $_GET["idCita"];

            $respuesta = ModeloCitas::mdlEliminarCita($tabla, $datos);

            if($respuesta == "ok"){
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡La cita ha sido eliminada correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'vacuna-has-hospital';
                                }
                            })
                        </script>";
            }else{
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡La cita no ha sido eliminada correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'vacuna-has-hospital';
                                }
                            })
                        </script>";
            }
        }
    }

}