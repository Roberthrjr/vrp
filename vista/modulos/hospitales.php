<div class="content-wrapper">
  <!-- CABECERA DEL CONTENIDO-->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Hospitales y Clínicas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Hospitales y Clínicas</li>
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
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarHospital">
        Agregar Hospitales o Clínicas
      </button>

      <!-- CUERPO DE LA CARTA -->
      <div class="card-body">
        <!-- CREACION DE TABLA -->
        <table class="table table-bordered table-striped table-responsive-lg tablas">

          <!-- CABECERA DE LA TABLA -->
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>telefono</th>
              <th>email</th>
              <th>contacto</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <!-- CUERPO DE LA TABLA -->
          <tbody>
            <?php

              $item=null;
              $valor=null;

              $hospitales = ControladorHospitales::ctrMostrarHospitales($item, $valor);

              foreach ($hospitales as $key => $value){

                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>'.$value["contacto"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarHospital" data-toggle="modal" data-target="#modalEditarHospital" idHospital="'.$value["id"].'">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          
                            <button class="btn btn-danger btnEliminarHospital" idHospital="'.$value["id"].'">
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

<!-- VENTANA MODAL PARA AGREGAR FARMACEUTICA -->
<div class="modal fade" id="modalAgregarHospital">
  
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">

      <!-- CABECERA DEL MODAL -->
      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Agregar Hospital o Clínica</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">
        <div class="card-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-hospital"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoHospital" placeholder="Nombre Hospital o Clínica" required>
            </div>
          </div>

          <!-- ENTRADA PARA LA DIRECCION -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-directions"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevaDireccion" placeholder="Ingresar Dirección" required>
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
              <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingresar Teléfono" required>
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
              <input type="email" class="form-control" name="nuevoEmail" placeholder="Correo Electrónico" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL CONTACTO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-md"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoContacto" placeholder="Dato del Contacto" required>
            </div>
          </div>

        </div>
      </div>

      <!-- PIE DEL MODAL -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Hospital o Clínica</button>
      </div>

      <?php

        $crearHospital = new ControladorHospitales();
        $crearHospital -> ctrCrearHospital();

      ?>

    </form>
    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>

<!-- VENTANA MODAL PARA EDITAR FARMACEUTICA -->
<div class="modal fade" id="modalEditarHospital">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Hospital o Clínica</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-hospital"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarHospital" name="editarHospital" required>
                <input type="hidden" id="idHospital" name="idHospital" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCION -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-directions"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarDireccion" name="editarDireccion" required>
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
                <input type="email" class="form-control" id="editarEmail" name="editarEmail" required>
              </div>
            </div>
            
            <!-- ENTRADA PARA EL CONTACTO -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-user-md"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarContacto" name="editarContacto" required>
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

          $editarHospital = new ControladorHospitales();
          $editarHospital -> ctrEditarHospital();

        ?>

      </form>

    </div>
          <!-- /.modal-content -->
  </div>
        <!-- /.modal-dialog -->
</div>

<?php

  $eliminarHospital = new ControladorHospitales();
  $eliminarHospital -> ctrEliminarHospital();

?>