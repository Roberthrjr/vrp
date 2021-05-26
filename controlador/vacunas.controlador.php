<?php

// SE CREA LA CLASE CONTROLADOR VACUNA
class ControladorVacunas{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function ctrMostrarVacunas($item,$valor){

        $tabla = "vacuna";

        $respuesta = ModeloVacunas::mdlMostrarVacunas($tabla,$item,$valor);

        return $respuesta;

    }

    // SE CREA EL METODO PARA CREAR VACUNA
    static public function ctrCrearVacuna(){

        if(isset($_POST["nuevaVacuna"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevaVacuna"])){

                    $tabla = "vacuna";

                    $datos = array( "nombre"=>$_POST["nuevaVacuna"],
                                    "efectividad"=>$_POST["nuevoEfectividad"],
                                    "stock"=>$_POST["nuevoStock"],
                                    "farmaceutica_idfarmaceutica"=>$_POST["nuevaFarmaceutica"]);

                    $respuesta = ModeloVacunas::mdlCrearVacuna($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡La vacuna ha sido guardada correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'vacunas';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡La vacuna no ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'vacunas';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La vacuna no puede ir vacía o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'vacunas';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA EDITAR VACUNAS
    static public function ctrEditarVacuna(){

        if(isset($_POST["editarVacuna"])){

            if( preg_match('/^[#\.\-a-zA-Z0-9ñÑ ]+$/', $_POST["editarVacuna"])){

                    $tabla = "vacuna";

                    $datos = array( "idvacuna"=>$_POST["idVacuna"],                    
                                    "nombre"=>$_POST["editarVacuna"],
                                    "efectividad"=>$_POST["editarEfectividad"],
                                    "stock"=>$_POST["editarStock"],
                                    "farmaceutica_idfarmaceutica"=>$_POST["editarFarmaceutica"]);

                    $respuesta = ModeloVacunas::mdlEditarVacuna($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡La vacuna ha sido actualizada correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'vacunas';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡La vacuna no ha sido actualizada correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'vacunas';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La vacuna no puede ir vacía o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'vacunas';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA ELIMINAR VACUNAS
    static public function ctrEliminarVacuna(){

        if(isset($_GET["idVacuna"])){

            $tabla = "vacuna";

            $datos = $_GET["idVacuna"];

            $respuesta = ModeloVacunas::mdlEliminarVacuna($tabla, $datos);

            if($respuesta == "ok"){
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡La vacuna ha sido eliminada correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'vacunas';
                                }
                            })
                        </script>";
            }else{
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡La vacuna no ha sido eliminada correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'vacunas';
                                }
                            })
                        </script>";
            }
        }
    }

}