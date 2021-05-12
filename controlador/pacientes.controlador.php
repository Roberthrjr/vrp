<?php

// SE CREA LA CLASE CONTROLADOR VACUNA
class ControladorPacientes{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function ctrMostrarPacientes($item,$valor){

        $tabla = "paciente";

        $respuesta = ModeloPacientes::mdlMostrarPacientes($tabla,$item,$valor);

        return $respuesta;

    }

    // SE CREA EL METODO PARA CREAR VACUNA
    static public function ctrCrearPaciente(){

        if(isset($_POST["nuevoPaciente"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevoPaciente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevaApellido"])){

                    $tabla = "paciente";

                    $datos = array( "nombre"=>$_POST["nuevoPaciente"],
                                    "apellido"=>$_POST["nuevaApellido"],
                                    "tipdoc"=>$_POST["nuevoTipdoc"],
                                    "numdoc"=>$_POST["nuevoNumdoc"],
                                    "numcel"=>$_POST["nuevoNumcel"],
                                    "mail"=>$_POST["nuevoMail"],
                                    "enfermedad"=>$_POST["nuevaEnfermedad"]);

                    $respuesta = ModeloPacientes::mdlCrearPaciente($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡El paciente ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'pacientes';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡El paciente no ha sido guardado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'pacientes';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡El paciente no puede ir vacío o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'pacientes';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA EDITAR VACUNAS
    static public function ctrEditarPaciente(){

        if(isset($_POST["editarPaciente"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["editarPaciente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["editarApellido"])){

                    $tabla = "paciente";

                    $datos = array( "id"=>$_POST["idPaciente"],                    
                                    "nombre"=>$_POST["editarPaciente"],
                                    "apellido"=>$_POST["editarApellido"],
                                    "tipdoc"=>$_POST["editarTipdoc"],
                                    "numdoc"=>$_POST["editarNumdoc"],
                                    "numcel"=>$_POST["editarNumcel"],
                                    "mail"=>$_POST["editarMail"],
                                    "enfermedad"=>$_POST["editarEnfermedad"]);

                    $respuesta = ModeloPacientes::mdlEditarPaciente($tabla, $datos);

                    if($respuesta == "ok"){

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡El paciente ha sido actualizado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'pacientes';
                                        }
                                })
                                </script>";
                    }else{

                        // SE LANZA UNA ALERTA PARA COMPROBAR SI LOS DATOS NO SE REGISTRARON
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡El paciente no ha sido actualizado correctamente!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Cerrar',
                                    closeOnConfirm: false
                                }).then((result)=>{
                                        if(result.value){
                                            window.location = 'pacientes';
                                        }
                                })
                                </script>";
                    }


            }else{
                
                // SE ACTIVA O SE LANZA UNA ALERTA SUAVE (SWEETALERT2)
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡El paciente no puede ir vacío o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'pacientes';
                            }
                    })</script>";
            }
        }
    }

    // SE CREA EL METODO PARA ELIMINAR VACUNAS
    static public function ctrEliminarPaciente(){

        if(isset($_GET["idPaciente"])){

            $tabla = "paciente";

            $datos = $_GET["idPaciente"];

            $respuesta = ModeloPacientes::mdlEliminarPaciente($tabla, $datos);

            if($respuesta == "ok"){
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡El paciente ha sido eliminado correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'pacientes';
                                }
                            })
                        </script>";
            }else{
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡El paciente no ha sido eliminado correctamente!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                                if(result.value){
                                    window.location = 'pacientes';
                                }
                            })
                        </script>";
            }
        }
    }

}