<div class="content-wrapper">
  <!-- CABECERA DEL CONTENIDO-->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Farmacéuticas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Farmacéuticas</li>
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
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFarmaceutica">
        Agregar Farmacéuticas
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
              <th>Pais</th>
              <th>Ciudad</th>
              <th>Dirección</th>
              <th>telefono</th>
              <th>email</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <!-- CUERPO DE LA TABLA -->
          <tbody>
            <?php

              $item=null;
              $valor=null;

              $farmaceuticas = ControladorFarmaceuticas::ctrMostrarFarmaceuticas($item, $valor);

              foreach ($farmaceuticas as $key => $value){

                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["pais"].'</td>
                        <td>'.$value["ciudad"].'</td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarFarmaceutica" data-toggle="modal" data-target="#modalEditarFarmaceutica" idFarmaceutica="'.$value["id"].'">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          
                            <button class="btn btn-danger btnEliminarFarmaceutica" idFarmaceutica="'.$value["id"].'">
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
<div class="modal fade" id="modalAgregarFarmaceutica">
  
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">

      <!-- CABECERA DEL MODAL -->
      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Agregar Farmacéutica</h4>
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
                  <i class="fas fa-book-medical"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevaFarmaceutica" placeholder="Ingresar Farmaceutica" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL PAIS -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-globe-americas"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoPais" placeholder="Ingresar País" required>
            </div>
          </div>

          <!-- ENTRADA PAR LA CIUDAD -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-city"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevaCiudad" placeholder="Ingresar Ciudad" required>
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

        </div>
      </div>

      <!-- PIE DEL MODAL -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Farmacéutica</button>
      </div>

      <?php

        $crearFarmaceutica = new ControladorFarmaceuticas();
        $crearFarmaceutica -> ctrCrearFarmaceutica();

      ?>

    </form>
    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>

<!-- VENTANA MODAL PARA EDITAR FARMACEUTICA -->
<div class="modal fade" id="modalEditarFarmaceutica">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Farmacéutica</h4>
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
                    <i class="fas fa-book-medical"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarFarmaceutica" name="editarFarmaceutica" required>
                <input type="hidden" id="idFarmaceutica" name="idFarmaceutica" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PAIS -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-globe-americas"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarPais" name="editarPais" required>
              </div>
            </div>

            <!-- ENTRADA PAR LA CIUDAD -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-city"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarCiudad" name="editarCiudad" required>
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

          </div>
        </div>


        <!-- PIE DEL MODAL -->
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        <?php 

          $editarCategoria = new ControladorFarmaceuticas();
          $editarCategoria -> ctrEditarFarmaceutica();

        ?>

      </form>

    </div>
          <!-- /.modal-content -->
  </div>
        <!-- /.modal-dialog -->
</div>

<?php

  $eliminarFarmaceutica = new ControladorFarmaceuticas();
  $eliminarFarmaceutica -> ctrEliminarFarmaceutica();

?>