// BOTON EDITAR FARMACEUTICA
$(".tablas").on("click", ".btnEditarFarmaceutica", function(){

    var idFarmaceutica = $(this).attr("idFarmaceutica");

    var datos = new FormData();
    datos.append("idFarmaceutica",idFarmaceutica);

    $.ajax({

        url:"ajax/farmaceutica.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

            $("#idFarmaceutica").val(respuesta["id"]);
            $("#editarFarmaceutica").val(respuesta["nombre"]);
            $("#editarPais").val(respuesta["pais"]);
            $("#editarCiudad").val(respuesta["ciudad"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarEmail").val(respuesta["email"]);
            
        }
    })
})

// BOTON ELIMINAR FARMACEUTICA
$(".tablas").on("click", ".btnEliminarFarmaceutica", function(){

    var idFarmaceutica = $(this).attr("idFarmaceutica");

    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro de eliminar la farmaceutica?',
        text: 'Si esta seguro, presiones en el boton azul',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Si, deseo eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=farmaceuticas&idFarmaceutica="+idFarmaceutica;
    
        }
    });
})