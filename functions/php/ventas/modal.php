<div class="modal fade" id="modalAgregarCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cliente Nuevo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="statusMsgClient"></div>
            <form role="form" method="post" action="#" name="agregarCliente" target="_blank">
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
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Escriba el teléfono del cliente">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Escriba el correo del cliente">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escriba la dirección del cliente">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="preferente">Cliente preferente</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preferente" id="preferente" value="1">
                                    <label class="form-check-label" for="preferente">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preferente" id="nopreferente" checked value="0">
                                    <label class="form-check-label" for="nopreferente">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="mayorista">Cliente Mayorista</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mayorista" id="mayorista" value="1">
                                    <label class="form-check-label" for="mayorista">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mayorista" id="nomayorista" checked value="0">
                                    <label class="form-check-label" for="nomayorista">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" name="btnGuardarCliente" id="btnGuardarCliente">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modalEditarCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="statusMsgClientEditar"></div>
            <form role="form" method="post" action="#" name="editarCliente" target="_blank">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombreEditar">Nombre</label>
                            <input type="text" class="form-control" name="nombreEditar" id="nombreEditar" placeholder="Escriba el nombre del cliente">
                        </div>
                        <div class="form-group">
                            <label for="apellidosEditar">Apellidos</label>
                            <input type="text" class="form-control" name="apellidosEditar" id="apellidosEditar" placeholder="Escriba los apellidos del cliente">
                        </div>
                        <div class="form-group">
                            <label for="telefonoEditar">Teléfono</label>
                            <input type="text" class="form-control" name="telefonoEditar" id="telefonoEditar" placeholder="Escriba el teléfono del cliente">
                        </div>
                        <div class="form-group">
                            <label for="correoEditar">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correoEditar" id="correoEditar" placeholder="Escriba el correo del cliente">
                        </div>
                        <div class="form-group">
                            <label for="direccionEditar">Dirección</label>
                            <input type="text" class="form-control" name="direccionEditar" id="direccionEditar" placeholder="Escriba la dirección del cliente">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="preferenteEditar">Cliente preferente</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preferenteEditar" id="preferenteEditar" value="1">
                                    <label class="form-check-label" for="preferenteEditar">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preferenteEditar" id="nopreferenteEditar" checked value="0">
                                    <label class="form-check-label" for="nopreferenteEditar">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="mayoristaEditar">Cliente Mayorista</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mayoristaEditar" id="mayoristaEditar" value="1">
                                    <label class="form-check-label" for="mayoristaEditar">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mayoristaEditar" id="nomayoristaEditar" checked value="0">
                                    <label class="form-check-label" for="nomayoristaEditar">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" name="btnEditarCliente" id="btnEditarCliente">Guardar</button>
                    <input type="hidden" id="id_cliente">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>