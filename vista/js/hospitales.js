// BOTON EDITAR HOSPITAL
$(".tablas").on("click", ".btnEditarHospital", function(){

    var idHospital = $(this).attr("idHospital");

    var datos = new FormData();
    datos.append("idHospital",idHospital);

    $.ajax({

        url:"ajax/hospital.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

            $("#idHospital").val(respuesta["idhospital"]);
            $("#editarHospital").val(respuesta["nombre"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarEmail").val(respuesta["email"]);
            
        }
    })
})

// BOTON ELIMINAR HOSPITAL
$(".tablas").on("click", ".btnEliminarHospital", function(){

    var idHospital = $(this).attr("idHospital");

    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro de eliminar el centro de salud?',
        text: 'Si esta seguro, presiones en el boton azul',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Si, deseo eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=hospitales&idHospital="+idHospital;
    
        }
    });
})