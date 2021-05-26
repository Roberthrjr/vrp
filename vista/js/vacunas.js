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
            
            $("#idVacuna").val(respuesta["idvacuna"]);
            $("#editarVacuna").val(respuesta["nombre"]);
            $("#editarEfectividad").val(respuesta["efectividad"]);
            $("#editarStock").val(respuesta["stock"]);

            var datosFarmaceutica = new FormData();
            datosFarmaceutica.append("idFarmaceutica", respuesta["farmaceutica_idfarmaceutica"])

            $.ajax({

                url:"ajax/farmaceutica.ajax.php",
                method:"POST",
                data: datosFarmaceutica,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:function(respuesta){
                    $("#editarFarmaceutica").val(respuesta["idfarmaceutica"]);
                    $("#editarFarmaceutica").html(respuesta["nombre"]);
                }
            })
            
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