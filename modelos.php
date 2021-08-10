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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administración de Modelos de Adoquin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Modelos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="row card-header">
                <div class="col-sm-10">
                    <h3 class="card-title">Lista de Modelos</h3>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-block btn-primary btn-sm" id="btnAgregarModelo">
                        <i class="fas fa-plus"></i>
                        <b>Añadir Modelo</b>
                    </button>
                </div>
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-md-12">
                    <div id="contenido" class="card-body table-responsive p-0"></div>
                </div>
            </div>
        </div>
        <?php
        include_once('functions/php/materiales/modelos/modal.php');
        ?>
    </section>
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
<script src="functions/js/modelos.js"></script>
</body>

</html>