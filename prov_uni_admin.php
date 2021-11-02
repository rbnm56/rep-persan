<?php
  include_once 'functions/php/sesiones.php';
  include_once 'dist/db/functions.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/sidebar.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row sm-2">
          <div class="col-sm-9">
            <h1>Administración de Proveedores - Unidades</h1>
          </div>
          <div class="col-md-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Otros</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h3 class="card-title">Lista de Proveedores</h3>
                  </div>
                  <div class="col-sm-6">
                      <button id="new_material" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#new_proveedor_modal">
                        <i class="fas fa-plus" ></i>
                        <b>Añadir Proveedor</b> 
                      </button> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <span id="records_content_provider"></span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h3 class="card-title">Lista de Unidades</h3>
                  </div>
                  <div class="col-sm-6">
                      <button id="new_material" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#new_unity_modal">
                        <i class="fas fa-plus" ></i>
                        <b>Añadir Unidad</b> 
                      </button> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <span id="records_content_unity"></span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- MODALS users -->
  <!-- Main Footer -->
  <?php

    include_once('functions/php/prov-uni/modalsProveedores.php');
    include_once('functions/php/prov-uni/modalsUnidades.php');
  
    //  <!-- Control Sidebar -->
    include_once 'templates/sidebar-right.php';
    //  <!-- Footer-->
    include_once 'templates/footer.php';

    
    
  ?>


<!-- Admin AJAX -->
<script src="functions/js/prov_uni-ajax.js"></script>
<script src="functions/js/script.js"></script>
