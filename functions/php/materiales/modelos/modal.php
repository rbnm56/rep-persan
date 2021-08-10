<div class="modal fade" id="modalAgregarModelo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modelo Nuevo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="statusMsgModel"></div>
            <form role="form" method="post" action="#" name="agregarModelo" target="_blank">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba el nombre del adoquin">
                        </div>
                        <div class="form-group">
                            <label for="medidas">Medidas</label>
                            <input type="text" class="form-control" name="medidas" id="medidas" placeholder="Escriba las medidas del adoquin">
                        </div>
                        <div class="form-group">
                            <label for="tablas">Tablas</label>
                            <input type="text" class="form-control" name="tablas" id="tablas" placeholder="Número de tablas por bulto">
                        </div>
                        <div class="form-group">
                            <label for="bultos">Bultos</label>
                            <input type="text" class="form-control" name="bultos" id="bultos" placeholder="Número de bultos por metro">
                        </div>
                        <div class="form-group">
                            <label for="grosor" class="col-form-label">Grosor</label>
                            <select class="form-control" name="grosor" id="grosor">
                                <option value="">Seleccione</option>
                                <option value="6">6 cm</option>
                                <option value="8">8 cm</option>
                                <option value="ambos">6cm / 8cm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tam_tabla" class="col-form-label">Tabla</label>
                            <select class="form-control" name="tam_tabla" id="tam_tabla">
                                <option value="">Seleccione</option>
                                <option value="1">Chica</option>
                                <option value="2">Grande</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" name="btnGuardarModelo" id="btnGuardarModelo">Guardar</button>
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
                            <input type="text" class="form-control" name="correoEditar" id="correoEditar" placeholder="Escriba el correo del cliente">
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