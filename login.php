<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  $cerrar_sesion = $_GET['cerrar_sesion'];
  if($cerrar_sesion){
    session_destroy();
  }
  include_once 'dist/db/functions.php';
  include_once 'templates/header.php';
?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>Persan</b></h1>
    </div>
    <div class="card-body">

      <form role= "form" name="login-admin" id="login-admin" method="post" action="functions/php/CRUD_Login.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id= "username" name="username" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
              <input type="hidden" name="login-admin" value="1">
              <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          </div>
          </form>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Admin AJAX -->
<script src="functions/js/admin-ajax.js"></script>
</body>
</html>
