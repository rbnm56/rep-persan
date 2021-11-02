
<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<form id="addForm_Unidades" method="post" action="">
<div class="modal fade" id="new_unity_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Unidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="unidad_name_add" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="unidad_name_add" id="unidad_name_add" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="des_unidad_add" class="col-form-label">Descripción</label>
            <input type="text" class="form-control" name="des_unidad_add" id="des_unidad_add">
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

<form id="edit_UnidadForm" method="get" action="">
<div class="modal fade" id="update_unidad_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <label for="unidad_name_edit" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="unidad_name_edit" id="unidad_name_edit">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 form-group">
            <label for="des_unidad_edit" class="col-form-label">Descripción</label>
            <input type="text" class="form-control" name="des_unidad_edit" id="des_unidad_edit">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        <button type="submit" class="btn btn-primary submit" value="Submit" >Guardar Cambios</button>
        <input type="hidden" id="hidden_unidad_id">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 
