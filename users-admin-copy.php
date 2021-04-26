<?php
  include_once 'functions/php/sesiones.php';
  include_once 'dist/db/functions.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/sidebar.php';

/* if($connect->ping()){
  echo "conectado";
}else{
  echo "No conectado";
} */
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administración de Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
  
                <div class="row card-header">
                  <div class="col-sm-10">
                    <h3 class="card-title">Lista de Usuarios</h3>
                  </div>
                  <div class="col-sm-2">
                      <form role="form" name="crear-admin" id="crear-admin" method="post" action="functions/php/insertar-admin.php">
                      <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modalAddUser"><i class="fas fa-plus" ></i><b>Añadir Usuario</b> </button>
                  </div>
                  <!-- Modal -->
                  <?php
                    include_once('functions/php/modalsUsers.php');
                  ?>
                                   
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Sucursal</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                          try{
                            $sql = "SELECT usuario_id,username, nombre_usuario, apellido_usuario, telefono, direccion, id_sucursal, id_permiso FROM usuarios";
                            $resultado = $connect->query($sql);
                          } catch(Exception $e){
                              $error = $e->getMessage();
                              echo $error;
                          }
                          while($usuarios = $resultado->fetch_assoc()){ ?>
                                <tr>
                                  <td><?php echo $usuarios['username'] ?></td>
                                  <td><?php echo $usuarios['nombre_usuario']?></td>
                                  <td><?php echo $usuarios['apellido_usuario']?></td>
                                  <td><?php echo $usuarios['telefono'] ?></td>
                                  <td><?php echo $usuarios['direccion'] ?></td>
                                  <td><?php echo $usuarios['id_sucursal'] ?></td>
                                  <td><?php echo $usuarios['id_permiso'] ?></td>
                                  <td>
                                  <div class=row>
                                    <!-- EDIT BUTTON-->
                                    <div class="col-md-6">
                                        <a href="#id=modalEditUser&id_user=<?php echo $usuarios['username']; ?>" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#modalEditUser"><i class="fas fa-edit"></i></a>
                                    </div>
                                    
                                  <!-- DELETE BUTTON -->
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#modalEditUser"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                  </div>
                                  </td>
                                </tr>
                          <?php }; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Sucursal</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php
    //  <!-- Control Sidebar -->
    include_once 'templates/sidebar-right.php';
    //  <!-- Footer-->
    include_once 'templates/footer.php'
  ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>