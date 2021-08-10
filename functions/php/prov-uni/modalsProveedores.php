
<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<form id="addForm_Proveedor" method="post" action="">
<div class="modal fade" id="new_proveedor_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="proveedor_name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="proveedor_name" id="proveedor_name" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="dir_proveedor_add" class="col-form-label">Dirección</label>
            <input type="text" class="form-control" name="dir_proveedor_add" id="dir_proveedor_add">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="des_proveedor_add" class="col-form-label">Descripción</label>
            <textarea class="form-control" rows="2" name="des_proveedor_add" id="des_proveedor_add"> </textarea>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="" class="btn btn-primary submit" value="Submit" >Agregar</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal - Update User details -->

<form id="edit_ProviderForm" method="get" action="">
<div class="modal fade" id="update_provider_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
          <div class="col-sm-12 form-group">
            <label for="proveedor_name_edit" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="proveedor_name_edit" id="proveedor_name_edit" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="dir_proveedor_edit" class="col-form-label">Dirección</label>
            <input type="text" class="form-control" name="dir_proveedor_edit" id="dir_proveedor_edit">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="des_proveedor_edit" class="col-form-label">Descripción</label>
            <textarea class="form-control" rows="2" name="des_proveedor_edit" id="des_proveedor_edit"> </textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        <button type="submit" class="btn btn-primary submit" value="Submit" >Guardar Cambios</button>
        <input type="hidden" id="hidden_provider_id">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 




