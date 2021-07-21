
<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<form id="addFormItem" method="post" action="">
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-9 form-group">
            <label for="item_name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="item_name" id="item_name" required/>
          </div>
          <div class="col-sm-3 form-group">
            <label for="item_price" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" name="item_price" id="item_price" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="item_description" class="col-form-label">Descripción:</label>
            <textarea class="form-control" rows="2" name="item_description" id="item_description"> </textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label for="item_unity" class="col-form-label">Unidad</label>
            <select class="form-control" name="item_unity" id="item_unity">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="item_provider" class="col-form-label">Proveedor</label>
            <select class="form-control" name="item_provider" id="item_provider">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="" class="btn btn-primary submit" value="Submit" >Agregar</button>
          <!-- <input class="submit" type="submit" value="Submit" onclick="addRecord()"> -->
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal - Update User details -->

<form id="editFormItem" method="get" action="">
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
          <div class="col-sm-9 form-group">
            <label for="item_name_edit" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="item_name_edit" id="item_name_edit" required/>
          </div>
          <div class="col-sm-3 form-group">
            <label for="item_price_edit" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" name="item_price_edit" id="item_price_edit" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="item_description_edit" class="col-form-label">Descripción:</label>
            <textarea class="form-control" rows="2" name="item_description_edit" id="item_description_edit"> </textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label for="item_unity_edit" class="col-form-label">Unidad</label>
            <select class="form-control" name="item_unity_edit" id="item_unity_edit">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="item_provider_edit" class="col-form-label">Proveedor</label>
            <select class="form-control" name="item_provider_edit" id="item_provider_edit">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        <button type="submit" class="btn btn-primary submit" value="Submit" >Guardar Cambios</button>
        <input type="hidden" id="hidden_producto_id">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 

