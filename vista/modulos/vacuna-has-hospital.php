<div class="content-wrapper">
  <!-- CABECERA DEL CONTENIDO-->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestionar Vacunación</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Vacunación</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- CONTENEDOR DE LA TABLA O CARTA DE CONTENIDO -->
    <div class="card">

      <!-- BOTON DE AGREGAR CATEGORIA EN LA TABLA -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCita">
        Agregar Cita
      </button>

      <!-- CUERPO DE LA CARTA -->
      <div class="card-body">
        <!-- CREACION DE TABLA -->
        <table class="table table-bordered table-striped table-responsive-lg tablas">

          <!-- CABECERA DE LA TABLA -->
          <thead>
            <tr>
              <th>#</th>
              <th>Vacuna</th>
              <th>Hospital</th>
              <th>Paciente</th>
              <th>Cantidad</th>
              <th>Primer Cita</th>
              <th>Segunda Cita</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <!-- CUERPO DE LA TABLA -->
          <tbody>
            <?php

              $item=null;
              $valor=null;

              $citas = ControladorCitas::ctrMostrarCitas($item, $valor);

              foreach ($citas as $key => $value){

                echo '<tr>
                        <td>'.($key+1).'</td>';

                        $item1 = "idvacuna";
                        $valor1 = $value["vacuna_idvacuna"];

                        $vacuna = ControladorVacunas::ctrMostrarVacunas($item1, $valor1);

                        $item2 = "idhospital";
                        $valor2 = $value["hospital_idhospital"];

                        $hospital = ControladorHospitales::ctrMostrarHospitales($item2, $valor2);

                        $item3 = "idpaciente";
                        $valor3 = $value["paciente_idpaciente"];

                        $paciente = ControladorPacientes::ctrMostrarPacientes($item3, $valor3);

                        echo '<td>'.$vacuna["nombre"].'</td>
                        <td>'.$hospital["nombre"].'</td>
                        <td>'.$paciente["nombre"].'</td>
                        <td>'.$value["cantidad"].'</td>
                        <td>'.$value["primer_cita"].'</td>
                        <td>'.$value["ultima_cita"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-danger btnEliminarVacuna" idCita="'.$value["idcita"].'">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </td>
                      </tr>';
              }

            ?>
          </tbody>

        </table>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>

<!-- VENTANA MODAL PARA AGREGAR CITAS -->
<div class="modal fade" id="modalAgregarCita">
  
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">

      <!-- CABECERA DEL MODAL -->
      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Agregar Cita</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">
        <div class="card-body">

        <!-- ENTRADA PARA VACUNA -->
            <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-syringe"></i>
                </span>
              </div>
              <select class="form-control" id="nuevaVacuna" name="nuevaVacuna" required>
                  <option value="">Seleccionar Vacuna</option>

                  <?php
                  
                  $item = null;
                  $valor1 = null;

                  $vacuna = ControladorVacunas::ctrMostrarVacunas($item,$valor);

                  foreach ($vacuna as $key => $value){

                    echo '<option value="'.$value["idvacuna"].'">'.$value["nombre"].'</option>';

                  }
                  
                  ?>
                </select>
            </div>
          </div>

           <!-- ENTRADA PARA HOSPITALES -->
           <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-hospital"></i>
                </span>
              </div>
              <select class="form-control" id="nuevoHospital" name="nuevoHospital" required>
                  <option value="">Seleccionar Hospital</option>

                  <?php
                  
                  $item = null;
                  $valor = null;

                  $hospital = ControladorHospitales::ctrMostrarHospitales($item,$valor);

                  foreach ($hospital as $key => $value){

                    echo '<option value="'.$value["idhospital"].'">'.$value["nombre"].'</option>';

                  }
                  
                  ?>
                </select>
            </div>
          </div>

           <!-- ENTRADA PARA PACIENTES -->
           <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-head-side-mask"></i>
                </span>
              </div>
              <select class="form-control" id="nuevoPaciente" name="nuevoPaciente" required>
                  <option value="">Seleccionar Paciente</option>

                  <?php
                  
                  $item = null;
                  $valor = null;

                  $paciente = ControladorPacientes::ctrMostrarPacientes($item,$valor);

                  foreach ($paciente as $key => $value){

                    echo '<option value="'.$value["idpaciente"].'">'.$value["nombre"].'</option>';

                  }
                  
                  ?>
                </select>
            </div>
          </div>

          <!-- ENTRADA PARA LA CANTIDAD -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-check"></i>
                </span>
              </div>
              <input type="number" min="0" class="form-control" name="nuevaCantidad" placeholder="Ingresar Cantidad" required>
            </div>
          </div>

          <!-- ENTRADA PARA LA ULTIMA FECHA -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" class="form-control" data-inputmask='"mask": "9999-99-99 99:99:59"' data-mask name="nuevaCita" placeholder="Ingresar Ultima Cita" required>
            </div>
          </div>

        </div>
      </div>

      <!-- PIE DEL MODAL -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Cita</button>
      </div>

      <?php

        $crearCita = new ControladorCitas();
        $crearCita -> ctrCrearCita();

      ?>

    </form>
    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>

<?php

  $eliminarCita = new ControladorCitas();
  $eliminarCita -> ctrEliminarCita();

?>