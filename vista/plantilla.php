<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacunagate</title>
    
    <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="vista/plugins/fontawesome-free/css/all.min.css"   >

    <!-- Theme style -->
    <link rel="stylesheet" href="vista/dist/css/adminlte.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="vista/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vista/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="vista/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="vista/plugins/daterangepicker/daterangepicker.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="vista/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="vista/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="vista/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    
    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <!-- jQuery -->
    <script src="vista/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="vista/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="vista/dist/js/demo.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="vista/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vista/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vista/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vista/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vista/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vista/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="vista/plugins/jszip/jszip.min.js"></script>
    <script src="vista/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="vista/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="vista/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="vista/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="vista/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- InputMask -->
    <script src="vista/plugins/moment/moment.min.js"></script>
    <script src="vista/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="vista/plugins/sweetalert2/sweetalert2.all.js"></script>

    <!-- jqueryNumber -->
    <script src="vista/plugins/jqueryNumber/jquerynumber.min.js"></script>

    <!-- Select2 -->
    <script src="vista/plugins/select2/js/select2.full.min.js"></script>

    <!-- date-range-picker -->
    <script src="vista/plugins/daterangepicker/daterangepicker.js"></script>

     <!-- Tempusdominus Bootstrap 4 -->
    <script src="vista/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

</head>
<body>
    <!--=====================================
    CUERPO DEL DOCUMENTO
    ======================================-->
    <?php
        
        echo '<body class="hold-transition sidebar-collapse sidebar-mini">';
        echo '<div class="wrapper">';

        // CABEZERA DEL CUERPO DEL DOCUMENTO
        include "modulos/header.php";

        // BARRA DE MENU PARA CUERPO DEL DOCUMENTO
        include "modulos/menu-bar.php";

        // CONTENIDO DEL CUERPO DEL DOCUMENTO
        if(isset($_GET["ruta"])){

            if($_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "usuarios" ||
                $_GET["ruta"] == "farmaceuticas" ||
                $_GET["ruta"] == "hospitales" ||
                $_GET["ruta"] == "vacunas" ||
                $_GET["ruta"] == "pacientes"){
                
                include "modulos/".$_GET["ruta"].".php";

            }else{
                
                include "modulos/404.php";
                
            }

        }else{

            include "modulos/inicio.php";

        }

        // PIE DEL CUERPO DEL DOCUMENTO
        include "modulos/footer.php";
        echo '</div>';
        echo '<script src="vista/js/plantilla.js"></script>';
        echo '<script src="vista/js/farmaceuticas.js"></script>';
        echo '<script src="vista/js/hospitales.js"></script>';
        echo '</body>'; 

    ?>

</html>