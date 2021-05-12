// BOTON EDITAR VACUNAS
$(".tablas").on("click", ".btnEditarVacuna", function(){

    var idVacuna = $(this).attr("idVacuna");

    var datos = new FormData();
    
    datos.append("idVacuna",idVacuna);

    $.ajax({

        url:"ajax/vacunas.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

            $("#idVacuna").val(respuesta["id"]);
            $("#editarVacuna").val(respuesta["nombre"]);
            $("#editarFabricante").val(respuesta["fabricante"]);
            $("#editarModAdministracion").val(respuesta["modAdministracion"]);
            $("#editarRefrigeracion").val(respuesta["refrigeracion"]);
            $("#editarEfectividad").val(respuesta["efectividad"]);
            
        }
    })
})

// BOTON ELIMINAR VACUNAS
$(".tablas").on("click", ".btnEliminarVacuna", function(){

    var idVacuna = $(this).attr("idVacuna");

    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro de eliminar la vacuna?',
        text: 'Si esta seguro, presiones en el boton azul',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Si, deseo eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=vacunas&idVacuna="+idVacuna;
    
        }
    });
})