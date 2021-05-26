// BOTON ELIMINAR CITA
$(".tablas").on("click", ".btnEliminarCita", function(){

    var idCita = $(this).attr("idCita");

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

            window.location = "index.php?ruta=vacuna-has-hospital&idCita="+idCita;
    
        }
    });
})