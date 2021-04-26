<?php
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
                    <h1 class="m-0">Administración de Clientes</h1>
                    <button type="button" class="btn btn-primary" id="btnAbrirAgregar">
                        Nuevo
                    </button>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h2 class="card-title">Clientes Existentes</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group ">
                            <input type="search" class="form-control form-control-md" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-md btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección </th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoClientes"></tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="modal fade" id="modalAgregar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cliente Nuevo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" method="post" action="clientes/nuevo.php" name="agregarCliente" target="_blank">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba el nombre del cliente">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Escriba los apellidos del cliente">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Escriba los telefono del cliente">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escriba los direccion del cliente">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" name="btnGuardar" id="btnGuardar">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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
<script src="funciones/clientes.js"></script>
</body>

</html>