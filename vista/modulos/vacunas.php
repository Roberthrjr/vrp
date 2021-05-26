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
              <th>Efectividad</th>
              <th>Stock</th>
              <th>Farmaceutica</th>
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
                        <td>'.$value["efectividad"].'</td>
                        <td>'.$value["stock"].'</td>';

                        $item = "idfarmaceutica";
                        $valor = $value["farmaceutica_idfarmaceutica"];

                        $farmaceutica = ControladorFarmaceuticas::ctrMostrarFarmaceuticas($item, $valor);

                        echo '<td>'.$farmaceutica["nombre"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarVacuna" data-toggle="modal" data-target="#modalEditarVacuna" idVacuna="'.$value["idvacuna"].'">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          
                            <button class="btn btn-danger btnEliminarVacuna" idVacuna="'.$value["idvacuna"].'">
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

          <!-- ENTRADA PARA LA EFECTIVIDAD -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-percentage"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoEfectividad" placeholder="Ingresar Efectividad" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL STOCK -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-check"></i>
                </span>
              </div>
              <input type="number" min="0" class="form-control" name="nuevoStock" placeholder="Stock" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL FARMACEUTICA -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-book-medical"></i>
                </span>
              </div>
              <select class="form-control" id="nuevaFarmaceutica" name="nuevaFarmaceutica" required>
                  <option value="">Seleccionar Farmaceutica</option>

                  <?php
                  
                  $item = null;
                  $valor = null;

                  $farmaceutica = ControladorFarmaceuticas::ctrMostrarFarmaceuticas($item,$valor);

                  foreach ($farmaceutica as $key => $value){

                    echo '<option value="'.$value["idfarmaceutica"].'">'.$value["nombre"].'</option>';

                  }
                  
                  ?>
                </select>
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

            <!-- ENTRADA PARA LA EFECTIVIDAD -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-percent"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="editarEfectividad" name="editarEfectividad" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL STOCK -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-check"></i>
                  </span>
                </div>
                <input type="number" min="0" class="form-control" id="editarStock" name="editarStock" required>
              </div>
            </div>
          
          <!-- ENTRADA PARA FARMACEUTICA -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-book-medical"></i>
                </span>
              </div>
              <select class="form-control" name="editarFarmaceutica" readonly required>
                  <option id="editarFarmaceutica"></option>
                </select>
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