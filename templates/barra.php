

<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
      <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge">
            <?php
              echo $_SESSION['nombre'];
            ?>
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
          <img src="dist/img/user1-256x256.png" class="img-circle elevation-2" alt="User Image">

            <p>
            <?php
              echo $_SESSION['nombre'];
            ?>
              <small><?php
              echo $_SESSION['username'];
            ?></small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="profile.php" class="btn btn-default btn-flat"><i class="fas fa-cog"></i> Perfil</a>
            <a href="login.php?cerrar_sesion=true" class="btn btn-default btn-flat float-right"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->