<?php

// SE CREA LA CLASE CONTROLADOR FARMACEUTICAS
class ControladorFarmaceuticas{

    // SE CREA EL METODO MOSTRAR FARMACEUTICAS
    static public function ctrMostrarFarmaceuticas($item,$valor){

        $tabla = "farmaceuticas";

        $respuesta = ModeloFarmaceuticas::mdlMostrarFarmaceutica($tabla,$item,$valor);

        return $respuesta;

    }

    // SE CREA EL METODO PARA CREAR FARMACEUTICA
    static public function ctrCrearFarmaceutica(){

        if(isset($_POST["nuevaFarmaceutica"])){

            if( preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST["nuevoPais"]) &&
                preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST["nuevaCiudad"]) &&
			    preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9ñÑ ]+$/', $_POST["nuevaDireccion"])){

                    $tabla = "farmaceuticas";

                    $datos = array( "nombre"=>$_POST["nuevaFarmaceutica"],
                                    "pais"=>$_POST["nuevoPais"],
                                    "ciudad"=>$_POST["nuevaCiudad"],
                                    "direccion"=>$_POST["nuevaDireccion"],
                                    "telefono"=>$_POST["nuevoTelefono"],
                                    "email"=>$_POST["nuevoEmail"]);

                    $respuesta = ModeloFarmaceuticas::mdlCrearFarmaceutica($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡La farmacéutica ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'farmaceuticas';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡La farmacéutica no ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'farmaceuticas';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La farmacéutica no puede ir vacío o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'farmaceuticas';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA EDITAR FARMACEUTICA
    static public function ctrEditarFarmaceutica(){

        if(isset($_POST["editarFarmaceutica"])){

            if( preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST["editarPais"]) &&
                preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST["editarCiudad"]) &&
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&
			    preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
                preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóú, ]+$/', $_POST["editarDireccion"])){

                    $tabla = "farmaceuticas";

                    $datos = array( "id"=>$_POST["idFarmaceutica"],
                                    "nombre"=>$_POST["editarFarmaceutica"],
                                    "pais"=>$_POST["editarPais"],
                                    "ciudad"=>$_POST["editarCiudad"],
                                    "direccion"=>$_POST["editarDireccion"],
                                    "telefono"=>$_POST["editarTelefono"],
                                    "email"=>$_POST["editarEmail"]);

                    $respuesta = ModeloFarmaceuticas::mdlEditarFarmaceutica($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡La farmacéutica ha sido actualizado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'farmaceuticas';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡La farmacéutica no ha sido actualizado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'farmaceuticas';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La farmacéutica no puede ir vacío o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'farmaceuticas';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA ELIMINAR FARMACEUTICA
    static public function ctrEliminarFarmaceutica(){

        if(isset($_GET["idFarmaceutica"])){

            $tabla = "farmaceuticas";

            $datos = $_GET["idFarmaceutica"];

            $respuesta = ModeloFarmaceuticas::mdlEliminarFarmaceutica($tabla, $datos);

            if($respuesta == "ok"){
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡La farmaceutica ha sido eliminado correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'farmaceuticas';
                                }
                            })
                        </script>";
            }else{
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡La farmaceutica no ha sido eliminado correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'farmaceuticas';
                                }
                            })
                        </script>";
            }
        }
    }

}