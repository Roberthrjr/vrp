<?php

// SE CREA LA CLASE CONTROLADOR VACUNA
class ControladorPacientes{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function ctrMostrarPacientes($item,$valor){

        $tabla = "paciente";

        $respuesta = ModeloPacientes::mdlMostrarPacientes($tabla,$item,$valor);

        return $respuesta;

    }

    // SE CREA EL METODO PARA CREAR PACIENTE
    static public function ctrCrearPaciente(){

        if(isset($_POST["nuevoNumero"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevoApellido"])){

                    $tabla = "paciente";

                    $datos = array( "numdoc"=>$_POST["nuevoNumero"],
                                    "nombre"=>$_POST["nuevoNombre"],
                                    "apellido"=>$_POST["nuevoApellido"],
                                    "telefono"=>$_POST["nuevoTelefono"],
                                    "email"=>$_POST["nuevoEmail"]);

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

        if(isset($_POST["editarNumero"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["editarNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["editarApellido"])){

                    $tabla = "paciente";

                    $datos = array( "idpaciente"=>$_POST["idPaciente"],                    
                                    "numdoc"=>$_POST["editarNumero"],
                                    "nombre"=>$_POST["editarNombre"],
                                    "apellido"=>$_POST["editarApellido"],
                                    "telefono"=>$_POST["editarTelefono"],
                                    "email"=>$_POST["editarEmail"]);

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