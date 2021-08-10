

/* ********* CRUD */

// Add Record
function addRecordProveedor() {
     // get values
    
    var proveedor_name = $("#proveedor_name").val();
    var dir_proveedor_add = $("#dir_proveedor_add").val();
    var des_proveedor_add = $("#des_proveedor_add").val();

    // Add record
    $.post("functions/php/prov-uni/CRUD_Proveedores.php", {
        funcion: "addRecord", 
        proveedor_name: proveedor_name,
        dir_proveedor_add: dir_proveedor_add,
        des_proveedor_add: des_proveedor_add,

    }, function (data, status) {
        // close the popup
            var datos = JSON.parse(data);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Proveedor añadido correctamente',
                    'success'
                );
                // Hide Modal
                $("#new_proveedor_modal").modal("hide");
                // read records again 
                readRecordsProveedores();

                // clear fields from the popup
                $("#proveedor_name").val("");
                $("#dir_proveedor_add").val("");
                $("#des_proveedor_add").val("");
                // clear class is-valid
                $("#proveedor_name").removeClass('is-valid');
                $("#dir_proveedor_add").removeClass('is-valid');
                $("#des_proveedor_add").removeClass('is-valid');

            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El proveedor no pudo ser añadido',
                    footer: 'Intenta nuevamente'
                  })
            }
            

    }); 
}

function addRecordUnidad() {
    // get values
   
   var unidad_name_add = $("#unidad_name_add").val();
   var des_unidad_add = $("#des_unidad_add").val();

   // Add record
   $.post("functions/php/prov-uni/CRUD_Unidades.php", {
       funcion: "addRecord", 
       unidad_name_add: unidad_name_add,
       des_unidad_add: des_unidad_add,

   }, function (data, status) {
       // close the popup
           var datos = JSON.parse(data);
           if (datos.respuesta == "exito") {
               Swal.fire(
                   'Correcto',
                   'Unidad añadida correctamente',
                   'success'
               );
               // Hide Modal
               $("#new_unity_modal").modal("hide");
               // read records again 
               readRecordsUnidades();

               // clear fields from the popup
               $("#unidad_name_add").val("");
               $("#des_unidad_add").val("");
               // clear class is-valid
               $("#unidad_name_add").removeClass('is-valid');
               $("#des_unidad_add").removeClass('is-valid');

           }else {
               Swal.fire({
                   icon: 'error',
                   title: 'Error',
                   text: 'La unidad no pudo ser añadida',
                   footer: 'Intenta nuevamente'
                 })
           }
           

   }); 
}

// READ records
function readRecordsProveedores() {

    $.get("functions/php/prov-uni/CRUD_Proveedores.php", {
        funcion: 'readRecords'
    }, function (data, status) {
        $("#records_content_provider").html(data);
    });
}

function readRecordsUnidades() {

    $.get("functions/php/prov-uni/CRUD_Unidades.php", {
        funcion: 'readRecords'
    }, function (data, status) {
        $("#records_content_unity").html(data);
    });
}


function DeleteProveedor(id) {
    Swal.fire({
        title: '¿Confirmas la eliminación del proveedor?',
        text: "La acción no podrá ser revertida",
        icon: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#008f39',
        confirmButtonText: 'Continuar',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.post("functions/php/prov-uni/CRUD_Proveedores.php", {
                funcion: "Delete",
                id: id
            },
                function (data, status) {
                   
                    var datos = JSON.parse(data);
                    if (datos.respuesta == "exito") {
                        // reload Users by using readRecords();
                        Swal.fire('Correcto!', 'Proveedor eliminado', 'success')
                        readRecordsProveedores();
                    }
                    else {
                        Swal.fire('No se pudo eliminar', '', 'error')
                    }
            }
        );
          
        } 
      })
}

function DeleteUnidad(id) {
    Swal.fire({
        title: '¿Confirmas la eliminación de la unidad?',
        text: "La acción no podrá ser revertida",
        icon: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#008f39',
        confirmButtonText: 'Continuar',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.post("functions/php/prov-uni/CRUD_Unidades.php", {
                funcion: "Delete",
                id: id
            },
                function (data, status) {
                   
                    var datos = JSON.parse(data);
                    if (datos.respuesta == "exito") {
                        // reload Users by using readRecords();
                        Swal.fire('Correcto!', 'Unidad eliminada', 'success')
                        readRecordsUnidades();
                    }
                    else {
                        Swal.fire('No se pudo eliminar', '', 'error')
                    }
            }
        );
          
        } 
      })
}



function GetProveedorDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_provider_id").val(id);
    $.post("functions/php/prov-uni/CRUD_Proveedores.php", {
            funcion: "GetDetails", 
            id: id
        },
        function (data, status) {
            // PARSE json data
            var datos = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#proveedor_name_edit").val(datos.consulta.nombre_proveedor);
            $("#dir_proveedor_edit").val(datos.consulta.direccion_proveedor);
            $("#des_proveedor_edit").val(datos.consulta.descripcion_proveedor);
            
        }
    );
    // Open modal popup
    $("#update_provider_modal").modal("show");
}

function GetUnidadDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_unidad_id").val(id);
    $.post("functions/php/prov-uni/CRUD_Unidades.php", {
            funcion: "GetDetails", 
            id: id
        },
        function (data, status) {
            // PARSE json data
            var datos = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#unidad_name_edit").val(datos.consulta.nombre_unidad);
            $("#des_unidad_edit").val(datos.consulta.descripcion_unidad);
            
        }
    );
    // Open modal popup
    $("#update_unidad_modal").modal("show");
}

function UpdateProveedorDetails() {
    // get values
    var proveedor_name_edit = $("#proveedor_name_edit").val();
    var dir_proveedor_edit = $("#dir_proveedor_edit").val();
    var des_proveedor_edit = $("#des_proveedor_edit").val();
    

    // get hidden field value
    var id = $("#hidden_provider_id").val();

    // Update the details by requesting to the server using ajax
    $.post("functions/php/prov-uni/CRUD_Proveedores.php", {
            funcion: "UpdateDetails",
            id: id,
            proveedor_name_edit: proveedor_name_edit,
            dir_proveedor_edit: dir_proveedor_edit,
            des_proveedor_edit : des_proveedor_edit

    },
        function (data, status) {
            var datos = JSON.parse(data);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Se han modificado los datos',
                    'success'
                );
                 // hide modal popup
                $("#update_provider_modal").modal("hide");
                $("#proveedor_name_edit").val("");
                $("#dir_proveedor_edit").val("");
                $("#des_proveedor_edit").val("");
                
                //Clear is valid class
                $("#proveedor_name_edit").removeClass('is-valid');
                $("#dir_proveedor_edit").removeClass('is-valid');
                $("#des_proveedor_edit").removeClass('is-valid');

                // reload Users by using readRecords();
                readRecordsProveedores();
            }else if(datos.respuesta == "error"){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El proveedor ya existe',
                    footer: 'Intenta nuevamente'
                  })
            }
           
        }
    )
}

function UpdateUnidadDetails() {
    // get values
    var unidad_name_edit = $("#unidad_name_edit").val();
    var des_unidad_edit = $("#des_unidad_edit").val();
    

    // get hidden field value
    var id = $("#hidden_unidad_id").val();

    // Update the details by requesting to the server using ajax
    $.post("functions/php/prov-uni/CRUD_Unidades.php", {
            funcion: "UpdateDetails",
            id: id,
            unidad_name_edit: unidad_name_edit,
            des_unidad_edit : des_unidad_edit

    },
        function (data, status) {
            var datos = JSON.parse(data);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Se han modificado los datos',
                    'success'
                );
                 // hide modal popup
                $("#update_unidad_modal").modal("hide");

                $("#unidad_name_edit").val("");
                $("#des_unidad_edit").val("");
                
                //Clear is valid class
                $("#unidad_name_edit").removeClass('is-valid');
                $("#des_unidad_edit").removeClass('is-valid');

                // reload Users by using readRecords();
                readRecordsUnidades();
            }else if(datos.respuesta == "error"){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El proveedor ya existe',
                    footer: 'Intenta nuevamente'
                  })
            }
           
        }
    )
}

$(document).ready(function () {
    // READ recods on page load
    readRecordsProveedores(); // calling function
    readRecordsUnidades();

});


//Validate Form PROVEEDORES

$("#addForm_Proveedor").validate({
    rules: {      
                proveedor_name: {
				required: true,
				minlength: 3
                },
                dir_proveedor_add:{
                required: true,
				minlength: 5
                },
                des_proveedor_add: {
				required: true,
				minlength: 5
                },
			},
			messages: {
				
				proveedor_name: {
				required: "Ingresa el nombre",
				minlength: "El nombre es muy corto"
                },
                dir_proveedor_add: {
				required: "Ingresa la dirección",
				minlength: "La dirección es muy corta"
                },
                des_proveedor_add: {
				required: "Ingresa la descripción",
				minlength: "La descripción es muy corta"
                },
                
			},
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
            submitHandler: function (form) {
                addRecordProveedor();
            }
}
);

$("#edit_ProviderForm").validate({
    rules: {
                  proveedor_name_edit: {
                      required: true,
                      minlength: 3
                  },
                  dir_proveedor_edit: {
                      required: true,
                      minlength: 5
                  },
                  des_proveedor_edit: {
                      required: true,
                      minlength: 5
                  },
                  
              },
              messages: {
                  
                  proveedor_name_edit: {
                      required: "Ingresa el nombre",
                      minlength: "El nombre es muy corto"
                  },
                  dir_proveedor_edit: {
                      required: "Ingresa la dirección",
                      minlength: "La dirección es muy corta"
                  },
                  des_proveedor_edit: {
                      required: "Ingresa la descripción",
                      minlength: "La descripción es muy corta0,02"
                  },
              },
              errorElement: 'span',
              errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
              },
              highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
              },
              unhighlight: function (element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
                  $(element).addClass('is-valid');
              },
              submitHandler: function (form) {
                //form.submit();
                UpdateProveedorDetails();
            }, 
}  
);

//Validate Form UNIDADES

$("#addForm_Unidades").validate({
    rules: {      
                unidad_name_add: {
				required: true,
				minlength: 3
                },
                des_unidad_add: {
				required: true,
				minlength: 5
                },
			},
			messages: {
				
				unidad_name_add: {
				required: "Ingresa el nombre",
				minlength: "El nombre es muy corto"
                },
                des_unidad_add: {
				required: "Ingresa la descripción",
				minlength: "La descripción es muy corta"
                },
                
			},
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
            submitHandler: function (form) {
                addRecordUnidad();
            }
}
);

$("#edit_UnidadForm").validate({
    rules: {
                  unidad_name_edit: {
                      required: true,
                      minlength: 3
                  },
                  des_unidad_edit: {
                      required: true,
                      minlength: 5
                  },
                  
              },
              messages: {
                  
                unidad_name_edit: {
                      required: "Ingresa el nombre",
                      minlength: "El nombre es muy corto"
                  },
                  des_unidad_edit: {
                      required: "Ingresa la descripción",
                      minlength: "La descripción es muy corta0,02"
                  },
              },
              errorElement: 'span',
              errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
              },
              highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
              },
              unhighlight: function (element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
                  $(element).addClass('is-valid');
              },
              submitHandler: function (form) {
                //form.submit();
                UpdateUnidadDetails();
            }, 
} );