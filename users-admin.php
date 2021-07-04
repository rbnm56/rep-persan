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
          <div class="col-sm-6">
            <h1>Administración de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-9">
                    <h3 class="card-title">Lista de Usuarios</h3>
                  </div>
                  <div class="col-sm-3">
                      <button id="new_user" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#add_new_record_modal">
                        <i class="fas fa-plus" ></i>
                        <b>Añadir Usuario</b> 
                      </button> 
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <span id="records_content"></span>
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

    include_once('functions/php/modalsUsers.php');
  
    //  <!-- Control Sidebar -->
    include_once 'templates/sidebar-right.php';
    //  <!-- Footer-->
    include_once 'templates/footer.php';

    
    
  ?>



