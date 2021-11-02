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

                <p class="text-muted text-center" id="username_left">
                </p>

                <h3 class="profile-username text-center" id="nombre_left">
                </h3>
               
                <p class="text-muted text-center" id="permiso_left">
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
                    <div class="row">
                      <div class="col-sm-9">

                      </div>
                      <div class="col-sm-3 form-group">
                        <div class="custom-control custom-switch float-sm-right">
                            <input type="checkbox" class="custom-control-input" id="Switch_profile_edit">
                            <label class="custom-control-label" for="Switch_profile_edit">Editar</label>
                        </div>
                      </div>
                    </div>
                    <form id="editForm_profile" method="get" action="">
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputUsername" name="inputUsername" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputApellido" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Apellido" disabled>
                        </div>
                      </div>
                      <div class="row" id="switch_profile_div">
                        <div class="col-sm-12 form-group">
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="pass_profile_switch" name="pass_profile_switch">
                              <label class="custom-control-label" for="pass_profile_switch">Cambiar Contraseña</label>
                            </div>
                        </div>
                      </div>
                    <div id="pass_profile_div">
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña" disabled>
                        </div>
                        <div class="col-sm-2">
                          <label for="inputPassword_repeat">Repetir Contraseña</label>
                        </div>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" id="inputPassword_repeat" name="inputPassword_repeat" placeholder="Repetir Contraseña" disabled>
                        </div>
                      </div>
                    </div>
                      <div class="form-group row">
                        <label for="inputTelefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Telefono" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputDireccion" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputDireccion" name="inputDireccion" placeholder="Dirección" disabled> </textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSucursal" class="col-sm-2 col-form-label">Sucursal</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputSucursal" name="inputSucursal" disabled>
                            <option></option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPermiso" class="col-sm-2 col-form-label">Permiso</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputPermiso" name="inputPermiso" disabled>
                            <option></option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-10 col-sm-10">
                        <button id="button_profile_edit" type="submit" class="btn btn-primary submit" value="Submit">Guardar</button>
                          <input type="text" id="hidden_id_profile" hidden value=<?php echo $_SESSION['id']; ?>>
                          
                        </div>
                      </div>
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
  <!-- Main Footer -->
  <?php
    //  <!-- Control Sidebar -->
    include_once 'templates/sidebar-right.php';
    //  <!-- Footer-->
    include_once 'templates/footer.php';

  ?>

<script src="functions/js/profile-ajax.js"></script>
<script src="functions/js/script.js"></script>