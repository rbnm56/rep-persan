/* ********* CRUD */

// Add Record
function addRecord() {
     // get values
    
    var item_name = $("#item_name").val();
    var item_price = $("#item_price").val();
    var item_description = $("#item_description").val();
    var item_unity = $("#item_unity").val();
    var item_provider = $("#item_provider").val(); 

    // Add record
    $.post("functions/php/productos/CRUD_items.php", {
        funcion: "addRecordItem", 
        item_name: item_name,
        item_price: item_price,
        item_description: item_description,
        item_unity: item_unity,
        item_provider: item_provider,
    }, function (data, status) {
        // close the popup
            var datos = JSON.parse(data);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Producto añadido correctamente',
                    'success'
                );
                // Hide Modal
                $("#add_new_record_modal").modal("hide");
                // read records again 
                readRecords();

                // clear fields from the popup
                $("#item_name").val("");
                $("#item_price").val("");
                $("#item_description").val("");
                $("#item_unity").val("");
                $("#item_provider").val("");

            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El producto no pudo ser añadido',
                    footer: 'Intenta nuevamente'
                  })
            }
            

    }); 
}

// READ records
function readRecords() {

    $.get("functions/php/productos/CRUD_items.php", {
        funcion: 'readRecords'
    }, function (data, status) {
            $("#records_content").html(data);
    });

    
}


function DeleteItem(id) {
    Swal.fire({
        title: '¿Confirmas la eliminación del producto?',
        text: "La acción no podrá ser revertida",
        icon: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#008f39',
        confirmButtonText: 'Continuar',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.post("functions/php/productos/CRUD_items.php", {
                funcion: "DeleteItem",
                id: id
            },
                function (data, status) {
                    var datos = JSON.parse(data);
                    if (datos.respuesta == "exito") {
                        // reload Users by using readRecords();
                        Swal.fire('Correcto!', 'Producto eliminado', 'success')
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


function GetItemDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_item_id").val(id);
    $.post("functions/php/productos/CRUD_items.php", {
            funcion: "GetItemDetails", 
            id: id
        },
        function (data, status) {
            // PARSE json data
            var item = JSON.parse(data);
            // Assing existing values to the modal popup fields
            
            $("#item_name_edit").val(item.consulta.nombre_producto);
            $("#item_price_edit").val(item.consulta.precio_producto);
            $("#item_description_edit").val(item.consulta.descripcion_producto);

            unidadID = item.consulta.id_unidad;
            proveedorID = item.consulta.id_proveedor;
            valores("consultaUnidad", "item_unity_edit", unidadID);
            valores("consultaProveedor", "item_provider_edit", proveedorID);
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateItemDetails() {
    // get values
    var item_name = $("#item_name_edit").val();
    var item_price = $("#item_price_edit").val();
    var item_description = $("#item_description_edit").val();
    var item_unity = $("#item_unity_edit").val();
    var item_provider = $("#item_provider_edit").val();

    // get hidden field value
    var id = $("#hidden_item_id").val();

    // Update the details by requesting to the server using ajax
    $.post("functions/php/productos/CRUD_items.php", {
            funcion: "UpdateItemDetails",
            id: id,
            item_name: item_name,
            item_price: item_price,
            item_description: item_description,
            item_unity: item_unity,
            item_provider: item_provider,
    },
        function (data, status) {
            var datos = JSON.parse(data);
            console.log(datos.respuesta);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Se han modificado los datos',
                    'success'
                );
                 // hide modal popup
                $("#update_user_modal").modal("hide");
                $("#passwordEdit").val("");
                $("#passwordConfirmEdit").val("");

                // reload Users by using readRecords();
                readRecords();
            }else if(datos.respuesta == "error"){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El usuario ya existe',
                    footer: 'Intenta nuevamente'
                  })
            }
           
        }
    )
}

$(document).ready(function () {
    // READ recods on page load

    readRecords(); // calling function

    //Agregar sucusales y permisos al data toggle

    var new_item=document.getElementById('new_item');
    new_item.addEventListener("click", function () {
        valores("consultaUnidad", "item_unity", 1);
        valores("consultaProveedor", "item_provider", 1);
    }) 
});


//Validate Form add Items

$("#addFormItem").validate({
  rules: {
				item_name: {
					required: true,
					minlength: 5
                },
                item_price: {
					required: true,
					number: true,
                },
                item_description: {
					required: true,
					minlength: 5
                },
			},
			messages: {
				
				item_name: {
					required: "Ingresa el nombre del producto",
					minlength: "El nombre del producto debe contener al menos 5 letras"
                },
                item_price: {
					required: "Ingresa el precio",
					number: "Ingresa un número válido"
                },

                item_description: {
                    required: "Ingresa la descripción",
                    minlength: "La descripción del producto debe contener al menos 5 letras"
                }
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

$("#editFormItem").validate({
    rules: {
                  item_name_edit: {
                      required: true,
                      minlength: 5
                  },
                  item_price_edit: {
                      required: true,
                      number: true,
                  },
                  item_description_edit: {
                      required: true,
                      minlength: 5
                  },
                  
              },
              messages: {
                  
                item_name_edit: {
                      required: "Ingresa el nombre del producto",
                      minlength: "El producto debe contener al menos 5 letras"
                  },
                  item_price_edit: {
                      required: "Ingresa el precio",
                      number: "Captura un número válido"
                  },
                  item_description_edit: {
                      required: "Ingresa una descripción",
                      minlength: "La descripción debe tener por lo menos 5 letras"
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
                UpdateItemDetails();
            }, 
}  
);

function GetMaterials(id) {
    var id = id;
    var result;
    $("#show_materials").modal("show");
    //Bootstrap Duallistbox

    var dual_materials = $('.duallistbox').bootstrapDualListbox({
        nonSelectedListLabel: 'Materiales',
        selectedListLabel: 'Materiales del Producto',
        moveOnSelect: false,
        infoTextEmpty: "Lista vacía",
        moveSelectedLabel: "Mover seleccionado",
        moveAllLabel: "Mover todos",
        removeSelectedLabel: "Remover seleccionado",
        removeAllLabel: "Remover todos"

    });
    
    var cons = "queryDouble_materials";
    $.post("dist/db/consultas.php", {
        funcion: cons,
        id: id,
    },
        function (data) {
            // PARSE json data
            result = JSON.parse(data);
            console.log(result);
            var i = 0;
            var j = 0;
            $(".bootstrap-duallistbox-container").find("*").prop("disabled", true);


            //Muestra todos los materiales en inventario
            if (dual_materials.empty() != true) {
                $(".box1").css('filter', 'blur(1px)');
                $.each(result.id_mat, function () {
                    $option = $('<option value = mat'+ result.id_mat[i] + ' >' + result.nombre_mat[i] + '</option>');

                    dual_materials.append($option);
                    //Tooltip con descripcion material
                    $('#mat'+result.id_mat[i]).tooltip();
                    i++;
                });
                

                //Seleciona los materiales de ese producto
                if (result.message_item != "Data not found!") {
                    $.each(result.id_pr_mt, function () {
                        $("#materials option[value=mat" + result.id_mat[j] + "]").attr("selected", "selected").css("font-weight", "bold");
                        j++;
                    });
                }
            }

            dual_materials.bootstrapDualListbox('refresh', true); 
            
        }
    );
    
    var edit_material_button = document.getElementById('edit_material_button');
    
    edit_material_button.addEventListener("click", function () {
        $(".box1").css('filter', 'blur(0px)');
        $(".bootstrap-duallistbox-container").find("*").prop("disabled", false);
    })
    
    

}