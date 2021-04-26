<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label for="username" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="username" id="username">
          </div>
          <div class="col-sm-6 form-group">
            <label for="password" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 form-group">
            <label for="nombre_usuario" class="col-form-label">Nombre (s)</label>
            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario">
          </div>
          <div class="col-sm-6 form-group">
            <label for="apellido_usuario" class="col-form-label">Apellido (s)</label>
            <input type="text" class="form-control" name="apellido_usuario" id="apellido_usuario">
          </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
              <label for="telefono" class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" name="telefono" id="telefono">
            </div>
        </div>
        <div class="form-group">
            <label for="direccion" class="col-form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label for="sucursal" class="col-form-label">Sucursal</label>
            <select class="form-control" name="sucursal" id="sucursal">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="permiso" class="col-form-label">Permiso</label>
            <select class="form-control" name="permiso" id="permiso">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="addRecord()">Agregar</button>
        </div>
    </div>
  </div>
</div>
<!-- // Modal --> 

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      
      
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label for="usernameEdit" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="usernameEdit" id="usernameEdit">
          </div>
          <div class="col-sm-6 form-group">
            <label for="passwordEdit" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control" name="passwordEdit" id="passwordEdit">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 form-group">
            <label for="nombre_usuarioEdit" class="col-form-label">Nombre (s)</label>
            <input type="text" class="form-control" name="nombre_usuarioEdit" id="nombre_usuarioEdit">
          </div>
          <div class="col-sm-6 form-group">
            <label for="apellido_usuarioEdit" class="col-form-label">Apellido (s)</label>
            <input type="text" class="form-control" name="apellido_usuarioEdit" id="apellido_usuarioEdit">
          </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
              <label for="telefonoEdit" class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" name="telefonoEdit" id="telefonoEdit">
            </div>
        </div>
        <div class="form-group">
            <label for="direccionEdit" class="col-form-label">Dirección</label>
            <input type="text" class="form-control" name="direccionEdit" id="direccionEdit">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label for="sucursalEdit" class="col-form-label">Sucursal</label>
            <select class="form-control" name="sucursalEdit" id="sucursalEdit">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="permisoEdit" class="col-form-label">Permiso</label>
            <select class="form-control" name="permisoEdit" id="permisoEdit">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Guardar Cambios</button>
        <input type="hidden" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 

