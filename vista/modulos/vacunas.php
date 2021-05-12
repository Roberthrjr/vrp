<div class="content-wrapper">
  <!-- CABECERA DEL CONTENIDO-->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Vacunas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Vacunas</li>
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
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVacunas">
        Agregar Vacunas
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
              <th>fabricante</th>
              <th>Modo de modAdministración</th>
              <th>Refrigeracion</th>
              <th>Efectividad</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <!-- CUERPO DE LA TABLA -->
          <tbody>
            <?php

              $item=null;
              $valor=null;

              $vacunas = ControladorVacunas::ctrMostrarVacunas($item, $valor);

              foreach ($vacunas as $key => $value){

                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["fabricante"].'</td>
                        <td>'.$value["modAdministracion"].'</td>
                        <td>'.$value["refrigeracion"].'</td>
                        <td>'.$value["efectividad"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarVacuna" data-toggle="modal" data-target="#modalEditarVacuna" idVacuna="'.$value["id"].'">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          
                            <button class="btn btn-danger btnEliminarVacuna" idVacuna="'.$value["id"].'">
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

<!-- VENTANA MODAL PARA AGREGAR VACUNAS -->
<div class="modal fade" id="modalAgregarVacunas">
  
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post">

      <!-- CABECERA DEL MODAL -->
      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Agregar Vacuna</h4>
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
                  <i class="fas fa-syringe"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevaVacuna" placeholder="Nombre Vacuna" required>
            </div>
          </div>

          <!-- ENTRADA PARA LA DIRECCION -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-vial"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevaFabricante" placeholder="Ingresar Fabricante" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL TELEFONO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-question-circle"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="modAdministracion" placeholder="Modo de administracion" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL EMAIL -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-temperature-low"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoRefrigeracion" placeholder="refrigeracion" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL CONTACTO -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-percentage"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoEfectividad" placeholder="Efectividad" required>
            </div>
          </div>

        </div>
      </div>

      <!-- PIE DEL MODAL -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Vacuna</button>
      </div>

      <?php

        $crearVacuna = new ControladorVacunas();
        $crearVacuna -> ctrCrearVacuna();

      ?>

    </form>
    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>

<!-- VENTANA MODAL PARA EDITAR FARMACEUTICA -->
<div class="modal fade" id="modalEditarVacuna">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Vacuna</h4>
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
                    <i class="fas fa-syringe"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarVacuna" name="editarVacuna" required>
                <input type="hidden" id="idVacuna" name="idVacuna" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA FABRICANTE -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-vial"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarFabricante" name="editarFabricante" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL TELEFONO -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-question-circle"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarModAdministracion" name="editarModAdministracion" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-temperature-low"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarRefrigeracion" name="editarRefrigeracion" required>
              </div>
            </div>
            
            <!-- ENTRADA PARA EL CONTACTO -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-percentage"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarEfectividad" name="editarEfectividad" required>
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

          $editarVacuna = new ControladorVacunas();
          $editarVacuna -> ctrEditarVacuna();

        ?>

      </form>

    </div>
          <!-- /.modal-content -->
  </div>
        <!-- /.modal-dialog -->
</div>

<?php

  $eliminarVacuna = new ControladorVacunas();
  $eliminarVacuna -> ctrEliminarVacuna();

?>