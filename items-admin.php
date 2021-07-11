<?php
  include_once 'functions/php/sesiones.php';
  include_once 'dist/db/functions.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/sidebar.php';

?>

<style>
  .test {
    -webkit-box-shadow: 0 1px 5px 1px #CFCFCF;
box-shadow: 0 1px 5px 1px #CFCFCF;

}

.box1{
  filter: blur(1px);
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row sm-2">
          <div class="col-sm-6">
            <h1>Administración de Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
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
                    <h3 class="card-title">Lista de Productos</h3>
                  </div>
                  <div class="col-sm-3">
                      <button id="new_item" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#add_new_record_modal">
                        <i class="fas fa-plus" ></i>
                        <b>Añadir Producto</b> 
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


  <!-- Main Footer -->
  <?php

    include_once('functions/php/productos/modals_Items.php');
  
    //  <!-- Control Sidebar -->
    include_once 'templates/sidebar-right.php';
    //  <!-- Footer-->
    include_once 'templates/footer.php';

    
    
  ?>

<!-- Modal - Mostrar Materiales -->
<!-- <form id="addForm" method="post" action=""> -->
<div class="modal fade" id="show_materials" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lista de Materiales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 form-group">
              <div class="row">
                <div class="col-sm-9">
                    <h3 class="card-title"></h3>
                </div>
                <div class="col-sm-3">
                    <a id="edit_material_button" class="btn btn-block btn-info btn-xs">
                      <i class="fas fa-edit" ></i> Editar
                    </a> 
                </div>
              </div>
          </div>
        <div class="row" id="duallist_div">
          <!-- /.card-header -->
          <div class="modal-body">
            <div class="row card">
              <div class="col-12 test">
                <div class="form-group">
                  <select class="duallistbox" multiple="multiple" id="materials">
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
      </div>     
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="" class="btn btn-primary submit" value="Submit" >Agregar</button>
          <!-- <input class="submit" type="submit" value="Submit" onclick="addRecord()"> -->
        </div>
        <!-- </form> -->
    </div>
  </div>
</div>



<!-- Admin AJAX -->
<script src="functions/js/items-ajax.js"></script>
<script src="functions/js/script.js"></script>

