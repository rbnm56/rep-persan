

/* ********* CRUD */

// Add Record
function addRecord() {
     // get values
    
    var material_name = $("#material_name").val();
    var des_material_add = $("#des_material_add").val();
    var proveedor_add = $("#proveedor_add").val();

    // Add record
    $.post("functions/php/materiales/CRUD_Materiales.php", {
        funcion: "addRecord", 
        material_name: material_name,
        des_material_add: des_material_add,
        proveedor_add: proveedor_add,

    }, function (data, status) {
        // close the popup
            var datos = JSON.parse(data);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Material añadido correctamente',
                    'success'
                );
                // Hide Modal
                $("#new_material_modal").modal("hide");
                // read records again 
                readRecords();

                // clear fields from the popup
                $("#material_name").val("");
                $("#des_material_add").val("");
                // clear class is-valid
                $("#material_name").removeClass('is-valid');
                $("#des_material_add").removeClass('is-valid');
                $("#proveedor_add").removeClass('is-valid');

            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El material no pudo ser añadido',
                    footer: 'Intenta nuevamente'
                  })
            }
            

    }); 
}

// READ records
function readRecords() {

    $.get("functions/php/materiales/CRUD_Materiales.php", {
        funcion: 'readRecords'
    }, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteMaterial(id) {
    Swal.fire({
        title: '¿Confirmas la eliminación del material?',
        text: "La acción no podrá ser revertida",
        icon: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#008f39',
        confirmButtonText: 'Continuar',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.post("functions/php/materiales/CRUD_Materiales.php", {
                funcion: "DeleteMaterial",
                id: id
            },
                function (data, status) {
                    var datos = JSON.parse(data);
                    if (datos.respuesta == "exito") {
                        // reload Users by using readRecords();
                        Swal.fire('Correcto!', 'Material eliminado', 'success')
                        readRecords();
                    }
                    else {
                        Swal.fire('No se pudo eliminar', '', 'error')
                    }
            }
        );
          
        } 
      })
}


function GetMaterialDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_material_id").val(id);
    $.post("functions/php/materiales/CRUD_Materiales.php", {
            funcion: "GetMaterialDetails", 
            id: id
        },
        function (data, status) {
            // PARSE json data
            var datos = JSON.parse(data);
            if (datos.status != 200) {
                $("#material_name_edit").val(datos.consulta.nombre_material);
                $("#des_material_edit").val(datos.consulta.descripcion_material);
                var proveedorID = datos.consulta.id_proveedor;
                if (proveedorID == "null") {
                    proveedorID = 1;
                }
                valores("consultaProveedor", "proveedor_edit", proveedorID);
                // Open modal popup
                $("#update_material_modal").modal("show");
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Se produjo un error',
                    footer: 'Intenta nuevamente'
                  })
            }
            // Assing existing values to the modal popup fields
            
            
        }
    );
}

function UpdateMaterialDetails() {
    // get values
    var material_name_edit = $("#material_name_edit").val();
    var des_material_edit = $("#des_material_edit").val();
    var proveedor_edit = $("#proveedor_edit").val();

    // get hidden field value
    var id = $("#hidden_material_id").val();

    // Update the details by requesting to the server using ajax
    $.post("functions/php/materiales/CRUD_Materiales.php", {
            funcion: "UpdateMaterialDetails",
            id: id,
            material_name_edit: material_name_edit,
            des_material_edit: des_material_edit,
            proveedor_edit : proveedor_edit

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
                $("#update_material_modal").modal("hide");
                $("#material_name_edit").val("");
                $("#des_material_edit").val("");
                
                //Clear is valid class
                $("#material_name_edit").removeClass('is-valid');
                $("#des_material_edit").removeClass('is-valid');
                $("#proveedor_edit").removeClass('is-valid');

                // reload Users by using readRecords();
                readRecords();
            }else if(datos.respuesta == "error"){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Se produjo un error',
                    footer: 'Intenta nuevamente'
                  })
            }
           
        }
    )
}

function Add_Provider(){
    var provider_name_add = $("#provider_name_add").val();
    var provider_dir_add = $("#provider_dir_add").val();
    var provider_description_add = $("#provider_description_add").val();

    // Add record
    $.post("functions/php/materiales/CRUD_Materiales.php", {
        funcion: "addRecordProvider", 
        provider_name_add: provider_name_add,
        provider_dir_add : provider_dir_add,
        provider_description_add: provider_description_add,

    }, function (data, status) {
        // close the popup
            var datos = JSON.parse(data);
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
              });
            if (datos.respuesta == "exito") {
                  Toast.fire({
                    icon: 'success',
                    title: 'Agregado correctamente'
                  })
                // Hide Modal
                valores("consultaProveedor", "proveedor_add", 1);
                $("#provider_add_modal").modal("hide");
                // read records again 

                // clear fields from the popup
                $("#provider_name_add").val("");
                $("#provider_dir_add").val("");
                $("#provider_description_add").val("");
                // clear class valid
                $("#provider_name_add").removeClass('is-valid');
                $("#provider_dir_add").removeClass('is-valid');
                $("#provider_description_add").removeClass('is-valid');


            }else {
                Toast.fire({
                    icon: 'error',
                    title: 'Se produjo un error'
                  })
            }
            

    }); 
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function


    //Agregar sucusales y permisos al data toggle

    var new_user=document.getElementById('new_material');
    new_user.addEventListener("click", function () {
        valores("consultaProveedor", "proveedor_add", 1);
    })

});


//Validate Form add User

$("#addForm_Materials").validate({
    rules: {      
                material_name: {
				required: true,
				minlength: 3
                },
                des_material_add: {
				required: true,
				minlength: 5
                },
			},
			messages: {
				
				material_name: {
				required: "Ingresa el nombre",
				minlength: "El nombre es muy corto"
                },
                des_material_add: {
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
                addRecord();
            }
}
);

$("#edit_MaterialForm").validate({
    rules: {
        material_name_edit: {
            required: true,
            minlength: 3
            },
            des_material_edit: {
            required: true,
            minlength: 5
            },
        },
        messages: {
            
            material_name_edit: {
            required: "Ingresa el nombre",
            minlength: "El nombre es muy corto"
            },
            des_material_edit: {
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
                //form.submit();
                UpdateMaterialDetails();
            }, 
}  
);
