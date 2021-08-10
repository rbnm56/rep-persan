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
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Perfil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php
// include Database connection file 

$id = $_SESSION['id'];

$query = "SELECT * FROM usuarios LEFT JOIN sucursales ON usuarios.id_sucursal = sucursales.sucursal_id LEFT JOIN permisos ON usuarios.id_permiso = permisos.permiso_id WHERE usuario_id = $id";

if (!$result = mysqli_query($connect, $query)) {
    exit(mysqli_error($connect));
};
if(mysqli_num_rows($result) > 0){
    	$row = mysqli_fetch_assoc($result);
    }
?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/user1-256x256.png"
                       alt="User profile picture">
                </div>

                <p class="text-muted text-center">
                    <?php
                    echo $row['username'];
                    ?>
                </p>

                <h3 class="profile-username text-center">
                    <?php
                    echo $row['nombre_usuario'].' '.$row['apellido_usuario'];
                    ?>
                </h3>
               
                <p class="text-muted text-center">
                    <?php
                    echo $row['nombre_permiso'];
                    ?>
                </p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h3 class="nav-link">Datos personales</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div>
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputUsername" value = <?php echo $row['username']; ?> placeholder="Username" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName"  value = <?php echo $row['nombre_usuario']; ?> placeholder="Nombre" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputApellido" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputApellido" value = <?php echo $row['apellido_usuario']; ?> placeholder="Apellido" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputTelefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputTelefono"  value = <?php echo $row['telefono']; ?> placeholder="Telefono" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputDireccion" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputDireccion" placeholder="Dirección" disabled><?php echo $row['direccion']; ?> </textarea>
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Enviar</button>
                        </div>
                      </div> -->
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- MODALS users -->
  <!-- Main Footer -->
  <?php
    //  <!-- Control Sidebar -->
    include_once 'templates/sidebar-right.php';
    //  <!-- Footer-->
    include_once 'templates/footer.php';

    
    
  ?>

