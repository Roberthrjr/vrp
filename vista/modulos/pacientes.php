<div class="content-wrapper">
  <!-- CABECERA DEL CONTENIDO-->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Pacientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Pacientes</li>
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
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPacientes">
        Agregar Pacientes
      </button>

      <!-- CUERPO DE LA CARTA -->
      <div class="card-body">
        <!-- CREACION DE TABLA -->
        <table class="table table-bordered table-striped table-responsive-lg tablas">

          <!-- CABECERA DE LA TABLA -->
          <thead>
            <tr>
              <th>#</th>
              <th>N° de documento</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <!-- CUERPO DE LA TABLA -->
          <tbody>
            <?php

              $item=null;
              $valor=null;

              $pacientes = ControladorPacientes::ctrMostrarPacientes($item, $valor);

              foreach ($pacientes as $key => $value){

                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["numdoc"].'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["apellido"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarPaciente" data-toggle="modal" data-target="#modalEditarPaciente" idPaciente="'.$value["idpaciente"].'">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          
                            <button class="btn btn-danger btnEliminarPaciente" idPaciente="'.$value["idpaciente"].'">
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

<!-- VENTANA MODAL PARA AGREGAR PACIENTES -->
<div class="modal fade" id="modalAgregarPacientes">
  
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">

      <!-- CABECERA DEL MODAL -->
      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Agregar Paciente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">
        <div class="card-body">

          <!-- ENTRADA PARA EL NUMERO DE DOCUMENTO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-id-card"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoNumero" placeholder="Número documento" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL NOMBRE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-injured"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoNombre" placeholder="Nombre Paciente" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL APELLIDO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-injured"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoApellido" placeholder="Apellido" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL TELEFONO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-phone"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingrese Telefono" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL EMAIL -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoEmail" placeholder="Ingrese Email" required>
            </div>
          </div>

        </div>
      </div>

      <!-- PIE DEL MODAL -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar </Paciente>
      </div>

      <?php

        $crearPaciente = new ControladorPacientes();
        $crearPaciente -> ctrCrearPaciente();

      ?>

    </form>
    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>

<!-- VENTANA MODAL PARA EDITAR PACIENTES -->
<div class="modal fade" id="modalEditarPaciente">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->
        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Paciente</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PARA EL NUMERO -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarNumero" name="editarNumero" required>
                <input type="hidden" id="idPaciente" name="idPaciente" required>
              </div>
            </div>

          <!-- ENTRADA PARA EL NOMBRE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-injured"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="editarNombre" name="editarNombre" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL APELLIDO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-injured"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="editarApellido" name="editarApellido" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL TELEFONO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-phone"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="editarTelefono" name="editarTelefono" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL EMAIL -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="editarEmail" name="editarEmail" required>
            </div>
          </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        <?php 

          $editarPaciente = new ControladorPacientes();
          $editarPaciente -> ctrEditarPaciente();

        ?>

      </form>

    </div>
          <!-- /.modal-content -->
  </div>
        <!-- /.modal-dialog -->
</div>

<?php

  $eliminarPaciente = new ControladorPacientes();
  $eliminarPaciente -> ctrEliminarPaciente();

?>