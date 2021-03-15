<?php

// SE CREA LA CLASE CONTROLADOR HOSPITAL
class ControladorHospitales{

    // SE CREA EL METODO MOSTRAR HOSPITAL
    static public function ctrMostrarHospitales($item,$valor){

        $tabla = "hospitales";

        $respuesta = ModeloHospitales::mdlMostrarHospitales($tabla,$item,$valor);

        return $respuesta;

    }

    // SE CREA EL METODO PARA CREAR HOSPITAL
    static public function ctrCrearHospital(){

        if(isset($_POST["nuevoHospital"])){

            if( preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9ñÑ ]+$/', $_POST["nuevaDireccion"])){

                    $tabla = "hospitales";

                    $datos = array( "nombre"=>$_POST["nuevoHospital"],
                                    "direccion"=>$_POST["nuevaDireccion"],
                                    "telefono"=>$_POST["nuevoTelefono"],
                                    "email"=>$_POST["nuevoEmail"],
                                    "contacto"=>$_POST["nuevoContacto"]);

                    $respuesta = ModeloHospitales::mdlCrearHospital($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡El Centro de Salud ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'hospitales';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡El Centro de Salud no ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'hospitales';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡El Centro de Salud no puede ir vacío o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'hospitales';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA EDITAR HOSPITAL
    static public function ctrEditarHospital(){

        if(isset($_POST["editarHospital"])){

            if( preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9ñÑ ]+$/', $_POST["editarDireccion"])){

                    $tabla = "hospitales";

                    $datos = array( "id"=>$_POST["idHospital"],                    
                                    "nombre"=>$_POST["editarHospital"],
                                    "direccion"=>$_POST["editarDireccion"],
                                    "telefono"=>$_POST["editarTelefono"],
                                    "email"=>$_POST["editarEmail"],
                                    "contacto"=>$_POST["editarContacto"]);

                    $respuesta = ModeloHospitales::mdlEditarHospital($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡El Centro de Salud ha sido actualizado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'hospitales';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡El Centro de Salud no ha sido actualizado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'hospitales';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡El Centro de Salud no puede ir vacío o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'hospitales';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA ELIMINAR HOSPITAL
    static public function ctrEliminarHospital(){

        if(isset($_GET["idHospital"])){

            $tabla = "hospitales";

            $datos = $_GET["idHospital"];

            $respuesta = ModeloHospitales::mdlEliminarHospital($tabla, $datos);

            if($respuesta == "ok"){
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡El Centro de Salud ha sido eliminado correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'hospitales';
                                }
                            })
                        </script>";
            }else{
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡El Centro de Salud no ha sido eliminado correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'hospitales';
                                }
                            })
                        </script>";
            }
        }
    }

}