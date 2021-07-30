/* ********* CRUD */

// Add Record
function addRecord() {
     // get values
    
    var item_name = $("#item_name").val();
    var item_price = $("#item_price").val();
    var item_description = $("#item_description").val();
    var item_unity = $("#item_unity").val();
    var item_provider = $("#item_provider").val();
    var materials = ($("#materials_add").val() || []).join(', ');
    var materials_array = materials.split(', ').sort();

    // Add record
    $.post("functions/php/productos/CRUD_items.php", {
        funcion: "addRecordItem", 
        item_name: item_name,
        item_price: item_price,
        item_description: item_description,
        item_unity: item_unity,
        item_provider: item_provider,
        materials_array: materials_array
    }, function (data, status) {
        // close the popup
            //console.log(data);
            var datos = JSON.parse(data);
            if (datos.producto.respuesta == "exito") {
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
                $("#materials_add").empty();
                $(".duallistbox_New").empty();

                // clear class valid
                $("#item_name").removeClass('is-valid');
                $("#item_price").removeClass('is-valid');
                $("#item_description").removeClass('is-valid');
                $("#item_unity").removeClass('is-valid');
                $("#item_provider").removeClass('is-valid');


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
                    if (datos.respuestaProd == "exito") {
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
    $("#hidden_producto_id_edit").val(id);

    $("#Switch_materials_edit").prop("checked", false);
    //Quita el blur en caso de que se haya activado previamente
    $(".box1").css('filter', 'blur(0px)'); 
    //Habilita el duallist n caso de que se haya activado previamente
    $(".bootstrap-duallistbox-container").find("*").prop("disabled", false);
    //Oculta el div de los materiales
    $('#edit_materials').hide();
    //Si el switch para los materiales cambia entonces
    $("#Switch_materials_edit").on('change', function() {  
        if ($("#Switch_materials_edit").is(':checked')) {  
            //Muestra el div de materiales
            $('#edit_materials').show();
            //Llama a la funcion para mostrar los materiales
            GetMaterials_EditItem(id);
        } else {  
            //Si cambia el switch, oculta los materiales
            $('#edit_materials').hide();
        }  
}); 
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
    $("#update_item_modal").modal("show");
}

function UpdateItemDetails() {
    // get values
    var item_name = $("#item_name_edit").val();
    var item_price = $("#item_price_edit").val();
    var item_description = $("#item_description_edit").val();
    var item_unity = $("#item_unity_edit").val();
    var item_provider = $("#item_provider_edit").val();

    // get hidden field value
    var id = $("#hidden_producto_id_edit").val();
    var cons = "queryDouble_materials";
    $.post("dist/db/consultas.php", {
        funcion: cons,
        id: id,
    },
        function (data) {
            // PARSE json data
            //$(".duallistbox").empty();
            result = JSON.parse(data);
            if (result.message_item == 'Data not found!'){
                id_prod_mat = 0;
            }else {
                id_prod_mat = result.producto_materiales_id;
            }
            //var total_mat = result.id_mat.length;
            //LLama a la funcion para ejecutar la consulta en mysql, pasando el ID del producto y el arreglo de los materiales seleccionados originalmente
            var campo_mat = "#materials_edit";
            UpdateMaterialDetails(id, id_prod_mat, campo_mat);
        });
    
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
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Se han modificado los datos',
                    'success'
                );
                 // hide modal popup
                $("#update_item_modal").modal("hide");

                // clear class valid
                $("#item_name_edit").removeClass('is-valid');
                $("#item_price_edit").removeClass('is-valid');
                $("#item_description_edit").removeClass('is-valid');
                $("#item_unity_edit").removeClass('is-valid');
                $("#item_provider_edit").removeClass('is-valid');

                // reload Users by using readRecords();
                readRecords();
            }else if(datos.respuesta == "error"){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El producto ya existe',
                    footer: 'Intenta nuevamente'
                  })
            }
           
        }
    )
}

$(document).ready(function () {
    // READ recods on page load
    
    $('#example1').DataTable( {
        "order": [[ 1, "asc" ]]
    } );

    readRecords(); // calling function
    //Agregar sucusales y permisos al data toggle

    var new_item=document.getElementById('new_item');
    new_item.addEventListener("click", function () {
        valores("consultaUnidad", "item_unity", 1);
        valores("consultaProveedor", "item_provider", 1);
    }) 

    // Al hacer click en añadir producto
    $("#new_item").click(function () {
        //Unchecked el switch para añadir materiales
        $("#Switch_materials").prop("checked", false);
        //Quita el blur en caso de que se haya activado previamente
        $(".box1").css('filter', 'blur(0px)'); 
        //Habilita el duallist n caso de que se haya activado previamente
        $(".bootstrap-duallistbox-container").find("*").prop("disabled", false);
        //Oculta el div de los materiales
        $('#add_materials').hide();
        //Si el switch para los materiales cambia entonces
        $("#Switch_materials").on('change', function() {  
            if ($("#Switch_materials").is(':checked')) {  
                //Muestra el div de materiales
                $('#add_materials').show();
                //Llama a la funcion para mostrar los materiales
                GetMaterialsNewItem();
            } else {  
                //Si cambia el switch, oculta los materiales
                $('#add_materials').hide();
            }  
    }); 
    });
    
});

function GetMaterials(id) {
    var id_inicial = id;
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
    // solicita y recibe la consulta de toda la tabla materiales y productos_materiales (ID solicitado)
    $(".box1").css('filter', 'blur(2px)');
    var cons = "queryDouble_materials";
    $.post("dist/db/consultas.php", {
        funcion: cons,
        id: id_inicial,
    },
        function (data) {
            // PARSE json data
            dual_materials.empty();
            result = JSON.parse(data);
            var i = 0;
            var j = 0;
            $("#hidden_item_id").val(result.id);
            $(".bootstrap-duallistbox-container").find("*").prop("disabled", true);
            //Oculta botones agregar y cancelar
            //$("#cancelar_mat_button").hide();
            $("#agregar_mat_button").hide();

            //Muestra todos los materiales en inventario
            //if (dual_materials.empty() != true) {
                //Aplica blur a la caja 1
                $(".box1").css('filter', 'blur(2px)');
                
                // Valida si existen datos de materiales
                if (result.message_material != 'Data not found!') {
                    //IDs de materiales en orden. Tabla "materiales"
                    var id_mat = result.id_mat.sort();
                    //inserta el option con valor ID_mat y nombre_material
                    $.each(id_mat, function () {
                        $option = $('<option value =' + id_mat[i] + ' >' + result.nombre_mat[i] + '</option>');
                        dual_materials.append($option);
                        i++;
                    });
                
                    //Cambia atributo a "selected" para los materiales del producto seleccionado
                    if (result.message_item != "Data not found!") {
                        //Ordena por el id de tabla "productos_materiales"
                        var id_pr_mt = result.id_pr_mt.sort();
                        //Para cada elemento encontrado en la tabla productos_materiales, cambia el atributo a seleccionado
                        $.each(result.id_pr_mt, function () {
                            $("#materials option[value=" + id_pr_mt[j] + "]").attr("selected", "selected");
                            j++;
                        });
                    }
                    dual_materials.bootstrapDualListbox('refresh', true); 

                    //Obtiene el elemento por ID
                    edit_material_button = document.getElementById('edit_material_button');
                    //Llama a la funcion al hacer clic
                    edit_material_button.addEventListener("click", function () {
                        //Muestra botones cancelar y agregar
                        $("#cancelar_mat_button").show();
                        $("#agregar_mat_button").show();
                        //Quita blur
                        $(".box1").css('filter', 'blur(0px)');
                        //Habilita Duallistbox
                        $(".bootstrap-duallistbox-container").find("*").prop("disabled", false);
                    });

                }
                // Si no hay materiales, se muestra error
                else {
                    Swal.fire(
                        'Error',
                        'Datos no encontrados',
                        'error'
                    ); 
                    //oculta modal en caso de no existir datos
                    $("#show_materials").modal("hide");
                    readRecords();
                }

                
            //}
            
        }
    );
    
}

$('#agregar_mat_button').click(function (event) {
    event.preventDefault();
    var id = $("#hidden_item_id").val();
    var cons = "queryDouble_materials";
    $.post("dist/db/consultas.php", {
        funcion: cons,
        id: id,
    },
        function (data) {
            // PARSE json data
            //$(".duallistbox").empty();
            result = JSON.parse(data);

            console.log(result);
            if (result.message_item == 'Data not found!'){
                id_prod_mat = 0;
            }else {
                id_prod_mat = result.producto_materiales_id;
            }
            //var total_mat = result.id_mat.length;
            //LLama a la funcion para ejecutar la consulta en mysql, pasando el ID del producto y el arreglo de los materiales seleccionados originalmente
            campo_mat = "#materials";
            UpdateMaterialDetails(id, id_prod_mat, campo_mat);
    });
    
      
});

//Actualiza la información con los datos elegidos
function UpdateMaterialDetails(ID, id_prod_mat, campo_mat) {
    var id = ID;
    var campo_mat = campo_mat;
    id_prod_mat = id_prod_mat;
    //Recolectando valores de option y convirtiendo a array
    materials = ($(campo_mat).val() || []).join(', ');
    var materials_array = materials.split(', ').sort();
    //Valida si el arreglo de materiales elegidos está vacío
    if ((materials_array[0] == "") && (id_prod_mat == 0) && (campo_mat != "#materials_edit")) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No hay datos que agregar',
            footer: 'Modifica la información'
        })

    }
    else if ((materials_array[0] == "") && (id_prod_mat == 0)) {
        return false;
    }
    else if ((campo_mat == "#materials_edit") && ($("#Switch_materials_edit").is(':checked'))) {
        $.post("functions/php/productos/CRUD_items.php", {
            funcion: "UpdateMaterials_Items",
            id: id,
            materials: materials_array,
            id_prod_mat: id_prod_mat,
        },
            function (data, status) {
                var datos = JSON.parse(data);
                var i = 0;
                var cont = 0;
                var cont_Error = 0;
                $.each(datos, function () {
                    if (datos[i].respuesta == "exito") {
                        cont++;
                    }
                    else {
                        cont_Error++;
                    }
                    i++;
                });
                /* if ((i == cont) && (cont_Error == 0)) { 
                
                } else {
                    
                } */
            })
        //return nn;
        readRecords();
    }
    else if (campo_mat == "#materials"){
        //Entra al ciclo si el total de materiales elegidos es igual al total de materiales en lista o si los ids de productos_materiales es 0
        //if ((materials_array.length != total_mat) || (id_prod_mat == 0)) {
    
            // Update the details by requesting to the server using ajax
            $.post("functions/php/productos/CRUD_items.php", {
                funcion: "UpdateMaterials_Items",
                id: id,
                materials: materials_array,
                id_prod_mat: id_prod_mat,
            },
                function (data, status) {
                    var datos = JSON.parse(data);
                    console.log(datos);
                    var i = 0;
                    var cont = 0;
                    var cont_Error = 0;
                    //Ciclo para contar el total de exitosos
                    $.each(datos, function () {
                        if (datos[i].respuesta == "exito") {
                            cont++;
                        }
                        else {
                            cont_Error++;
                        }
                        i++;
                    });
                    //Valida si todas las consultas fueron exitosas
                    if ((i == cont) && (cont_Error == 0) ) {
                        Swal.fire(
                            'Correcto',
                            'Se han modificado los datos',
                            'success'
                        );
                        // hide modal popup
                        $("#show_materials").modal("hide");
                        $("#materials").empty();
                        $('.duallistbox').empty();

                        // reload Users by using readRecords();
                        readRecords();

                        //Termina el event listener para evitar propagacion y/o repeticion
                        var edit_material_button = document.getElementById('edit_material_button');
                        edit_material_button.addEventListener("click", function (event) {
                            event.stopImmediatePropagation();
                        });
                        $("#agregar_mat_button").click(function (event) {
                            event.stopImmediatePropagation();
                        });
                    //Si las consultas no fueron exitosas    
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Se produjo un error',
                            footer: 'Intenta nuevamente'
                        })
                    }
                
                }
            )
        /* } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No hay datos que agregar',
                footer: 'Modifica la información'
            })

            $("#show_materials").modal("hide");
            $("#materials").empty();
        } */
    }
}

//Muestra los materiales disponibles para añadir en un producto nuevo
function GetMaterialsNewItem() {
   
    var dual_materials = $('.duallistbox_New').bootstrapDualListbox({
        nonSelectedListLabel: 'Materiales',
        selectedListLabel: 'Materiales del Producto',
        moveOnSelect: false,
        infoTextEmpty: "Lista vacía",
        moveSelectedLabel: "Mover seleccionado",
        moveAllLabel: "Mover todos",
        removeSelectedLabel: "Remover seleccionado",
        removeAllLabel: "Remover todos"

    });
    dual_materials.empty();
   
    var cons = "consultaMateriales";
    $.post("dist/db/consultas.php", {
        funcion: cons,
    },
        function (data) {
            // PARSE json data
            result = JSON.parse(data);
            var i = 0;
            var j = 0;
            // Valida si existen datos de materiales
            if (dual_materials.empty() != true) {
                if (result.message != 'Data not found!') {
                    //IDs de materiales en orden. Tabla "materiales"
                    var id_mat = result.id.sort();
                    //inserta el option con valor ID_mat y nombre_material
                    $.each(id_mat, function () {
                        $option = $('<option value =' + id_mat[i] + ' >' + result.nombre[i] + '</option>');
                        dual_materials.append($option);
                        i++;
                    });
                    dual_materials.bootstrapDualListbox('refresh', true);

                }
                // Si no hay materiales, se muestra error
                else {
                    Swal.fire(
                        'Error',
                        'Datos no encontrados',
                        'error'
                    );
                    //oculta div en caso de no existir datos
                    $('#edit_materials').hide();
                    $("#Switch_materials").prop("checked", false);
                }
            }
        }
    );
}

//Muestra los materiales del producto desde el boton editar
function GetMaterials_EditItem(id) {
    var id_inicial = id;
    //Bootstrap Duallistbox

    var dual_materials = $('.duallistbox_edit').bootstrapDualListbox({
        nonSelectedListLabel: 'Materiales',
        selectedListLabel: 'Materiales del Producto',
        moveOnSelect: false,
        infoTextEmpty: "Lista vacía",
        moveSelectedLabel: "Mover seleccionado",
        moveAllLabel: "Mover todos",
        removeSelectedLabel: "Remover seleccionado",
        removeAllLabel: "Remover todos"

    });
    // solicita y recibe la consulta de toda la tabla materiales y productos_materiales (ID solicitado)
    var cons = "queryDouble_materials";
    $.post("dist/db/consultas.php", {
        funcion: cons,
        id: id_inicial,
    },
        function (data) {
            // PARSE json data
            dual_materials.empty();
            result = JSON.parse(data);
            var i = 0;
            var j = 0;
            $("#hidden_producto_id_edit").val(result.id);

            //Muestra todos los materiales en inventario
            if (dual_materials.empty() != true) {
                
                // Valida si existen datos de materiales
                if (result.message_material != 'Data not found!') {
                    //IDs de materiales en orden. Tabla "materiales"
                    var id_mat = result.id_mat.sort();
                    //inserta el option con valor ID_mat y nombre_material
                    $.each(id_mat, function () {
                        $option = $('<option value =' + id_mat[i] + ' >' + result.nombre_mat[i] + '</option>');
                        dual_materials.append($option);
                        i++;
                    });
                
                    //Cambia atributo a "selected" para los materiales del producto seleccionado
                    if (result.message_item != "Data not found!") {
                        //Ordena por el id de tabla "productos_materiales"
                        var id_pr_mt = result.id_pr_mt.sort();
                        //Para cada elemento encontrado en la tabla productos_materiales, cambia el atributo a seleccionado
                        $.each(result.id_pr_mt, function () {
                            $("#materials_edit option[value=" + id_pr_mt[j] + "]").attr("selected", "selected");
                            j++;
                        });
                    }
                    dual_materials.bootstrapDualListbox('refresh', true); 

                    //Obtiene el elemento por ID
                   /*  edit_material_button = document.getElementById('edit_material_button'); */
                    //Llama a la funcion al hacer clic
                    /* edit_material_button.addEventListener("click", function () {
                        //Muestra botones cancelar y agregar
                        $("#cancelar_mat_button").show();
                        $("#agregar_mat_button").show();
                        //Quita blur
                        $(".box1").css('filter', 'blur(0px)');
                        //Habilita Duallistbox
                        $(".bootstrap-duallistbox-container").find("*").prop("disabled", false);
                    }); */

                }
                // Si no hay materiales, se muestra error
                
                else {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                      });
                      Toast.fire({
                        icon: 'error',
                        title: 'No se encontraron materiales'
                      })
                    //oculta div en caso de no existir datos
                    $("#edit_materials").modal("hide");
                    $("#Switch_materials_edit").prop("checked", false);
                }
            }
            
        }
    );
    
}

function Add_Unity(){
    var unity_name_add = $("#unity_name_add").val();
    var unity_description_add = $("#unity_description_add").val();

    // Add record
    $.post("functions/php/productos/CRUD_items.php", {
        funcion: "addRecordUnity", 
        unity_name_add: unity_name_add,
        unity_description_add: unity_description_add,

    }, function (data, status) {
        // close the popup
            //console.log(data);
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
                valores("consultaUnidad", "item_unity", 1);
                $("#unity_item_modal").modal("hide");
                // read records again 

                // clear fields from the popup
                $("#unity_name_add").val("");
                $("#unity_description_add").val("");
                // clear class valid
                $("#unity_name_add").removeClass('is-valid');
                $("#unity_description_add").removeClass('is-valid');


            }else {
                Toast.fire({
                    icon: 'error',
                    title: 'Se produjo un error'
                  })
            }
            

    }); 
}

function Add_Provider(){
    var provider_name_add = $("#provider_name_add").val();
    var provider_dir_add = $("#provider_dir_add").val();
    var provider_description_add = $("#provider_description_add").val();

    // Add record
    $.post("functions/php/productos/CRUD_items.php", {
        funcion: "addRecordProvider", 
        provider_name_add: provider_name_add,
        provider_dir_add : provider_dir_add,
        provider_description_add: provider_description_add,

    }, function (data, status) {
        // close the popup
            //console.log(data);
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
                valores("consultaProveedor", "item_provider", 1);
                $("#provider_item_modal").modal("hide");
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
                      minlength: "El nombre del producto es muy corto"
                  },
                  item_price: {
                      required: "Ingresa el precio",
                      number: "Ingresa un número válido"
                  },
  
                  item_description: {
                      required: "Ingresa la descripción",
                      minlength: "La descripción del producto es muy corta"
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
                  UpdateItemDetails();
              }, 
  }  
  );


  $("#unity_form").validate({
    rules: {
                    unity_name_add: {
                    required: true,
                    minlength: 2
                  },
                    unity_description_add: {
                    required: true,
                    minlength: 5
                  },
              },
              messages: {
                  
                unity_name_add: {
                      required: "Ingresa el nombre de la unidad",
                      minlength: "El nombre de la unidad es muy corta"
                  },
                  unity_description_add: {
                      required: "Ingresa el precio",
                      minlength: "La descripción es muy corta"
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
                Add_Unity();
            }, 
}  
  );

  $("#provider_form").validate({
    rules: {
                    provider_name_add: {
                    required: true,
                    minlength: 2
                    },
                    provider_dir_add: {
                    required: true,
                    minlength: 5
                    },
                    provider_description_add: {
                    required: true,
                    minlength: 5
                  },
              },
              messages: {
                  
                    provider_name_add: {
                    required: "Ingresa el nombre del proveedor",
                    minlength: "El nombre del proveedor es muy corto"
                    },
                    provider_dir_add: {
                    required: "Ingresa la dirección",
                    minlength: "La dirección es muy corta"
                    },
                    provider_description_add: {
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
                  //$(element).removeClass('is-valid');
                  Add_Provider();
                  
            }, 
}  
  );

function eliminaClass_Valid(){
    $("#provider_name_add").removeClass('is-valid');
    $("#provider_dir_add").removeClass('is-valid');
    $("#provider_description_add").removeClass('is-valid');
  }