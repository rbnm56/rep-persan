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
                    <h1 class="m-0">Administración de Ventas</h1>
                    <button type="button" class="btn btn-primary" id="btnAbrirAgregar">
                        Nuevo
                    </button>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
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
                        <h2 class="card-title">Ventas Existentes</h2>
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
                            <th>Fecha</th>
                            <th>No. Nota</th>
                            <th>Cliente</th>
                            <th>Cantidad </th>
                            <th>Unidad</th>
                            <th>Concepto</th>
                            <th>Medida</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                            <th>A cuenta</th>
                            <th>Debe</th>
                            <th>Fecha Pago</th>
                            <th>Fecha Entrega</th>
                            <th>No. Factura</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoClientes"></tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="modal fade" id="modalAgregar">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Nota Nueva</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" method="post" action="ventas/nuevo.php" name="agregarNota" target="_blank">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="num_nota">No. nota</label>
                                            <input type="text" class="form-control" name="num_nota" id="num_nota" placeholder="Num nota">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="fecha_venta">Fecha</label>
                                            <input type="date" class="form-control" name="fecha_venta" id="fecha_venta">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Cliente</label>
                                            <select class="form-control" name="cliente_venta">
                                                <option value="1">Cliente 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="direccion_venta">Direccion</label>
                                            <input type="text" class="form-control" name="direccion_venta" id="direccion_venta">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="telefono_venta">Telefono</label>
                                            <input type="text" class="form-control" name="telefono_venta" id="telefono_venta">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="metros_material">Cantidad</label>
                                            <input type="text" class="form-control" name="metros_material" id="metros_material" placeholder="Metros cuadrados">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <select class="form-control" name="material_material">
                                                <option value="1">Adoquin 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="piezas_material">Piezas</label>
                                            <input type="text" class="form-control" name="piezas_material" id="piezas_material" readonly placeholder="Total de piezas">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="precio_material">Precio</label>
                                            <input type="text" class="form-control" name="precio_material" id="precio_material" placeholder="Metros cuadrados">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="total_material">Total</label>
                                            <input type="text" class="form-control" name="total_material" id="total_material" placeholder="Metros cuadrados">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div><label for="total_material"> &sbquo; </label></div>
                                            <div class="form-group">
                                                <button class="btn btn-success" name="btnAgregarMaterial" id="btnAgregarMaterial">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Descripcion</th>
                                            <th>Piezas</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoMateriales"></tbody>
                                </table>

                                <div class="row">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subtotal_venta">Subtotal</label>
                                            <div>
                                                <input type="text" class="form-control" name="subtotal_venta" id="subtotal_venta" placeholder="Metros cuadrados">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="anticipo_venta">A cuenta</label>
                                            <input type="text" class="form-control" name="anticipo_venta" id="anticipo_venta" placeholder="Metros cuadrados">
                                        </div>
                                        <div class="form-group">
                                            <label for="total_venta">Total</label>
                                            <input type="text" class="form-control" name="total_venta" id="total_venta" placeholder="Metros cuadrados">
                                        </div>
                                    </div>
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
<script src="funciones/ventas.js"></script>
</body>

</html>