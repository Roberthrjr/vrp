// BOTON EDITAR VACUNAS
$(".tablas").on("click", ".btnEditarPaciente", function(){

    var idPaciente = $(this).attr("idPaciente");

    var datos = new FormData();
    
    datos.append("idPaciente",idPaciente);

    $.ajax({

        url:"ajax/pacientes.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

            $("#idPaciente").val(respuesta["idpaciente"]);
            $("#editarNumero").val(respuesta["numdoc"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarApellido").val(respuesta["apellido"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarEmail").val(respuesta["email"]);
            
        }
    })
})

// BOTON ELIMINAR VACUNAS
$(".tablas").on("click", ".btnEliminarPaciente", function(){

    var idPaciente = $(this).attr("idPaciente");

    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro de eliminar el paciente?',
        text: 'Si esta seguro, presione en el boton azul',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Si, deseo eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=pacientes&idPaciente="+idPaciente;
    
        }
    });
})