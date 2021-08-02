
<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<form id="addForm_Materials" method="post" action="">
<div class="modal fade" id="new_material_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="material_name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="material_name" id="material_name" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="des_material_add" class="col-form-label">Descripción</label>
            <input type="text" class="form-control" name="des_material_add" id="des_material_add">
          </div>
        </div>
        <div class="col-sm-6 form-group">
            <div class="row">
              <div class="col-sm-9">
                <label for="proveedor_add" class="col-form-label">Proveedor</label>
              </div>
              <div class="col-sm-3 float-sm-right">
                <a id="add_provider_button" class="nav-link" data-toggle="modal" data-target="#provider_add_modal">
                  <i class="fas fa-plus" ></i>
                </a>
              </div>
            </div>
              <select class="form-control" name="proveedor_add" id="proveedor_add">
              <option value="ninguno">Seleccione</option>
            </select>
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

<form id="edit_MaterialForm" method="get" action="">
<div class="modal fade" id="update_material_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <label for="material_name_edit" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="material_name_edit" id="material_name_edit">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="des_material_edit" class="col-form-label">Descripción</label>
            <input type="text" class="form-control" name="des_material_edit" id="des_material_edit">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label for="proveedor_edit" class="col-form-label">Proveedor</label>
            <select class="form-control" name="proveedor_edit" id="proveedor_edit">
              <option value="ninguno">Seleccione</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        <button type="submit" class="btn btn-primary submit" value="Submit" >Guardar Cambios</button>
        <input type="hidden" id="hidden_material_id">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 



<form id="provider_form" method="get" action="">
<div class="modal fade" id="provider_add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Añadir Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="provider_name_add" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="provider_name_add" id="provider_name_add" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="provider_dir_add" class="col-form-label">Dirección:</label>
            <input type="text" class="form-control" name="provider_dir_add" id="provider_dir_add" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="provider_description_add" class="col-form-label">Descripción:</label>
            <textarea class="form-control" rows="2" name="provider_description_add" id="provider_description_add"> </textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
        <button type="submit" class="btn btn-primary submit" value="Submit" >Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
