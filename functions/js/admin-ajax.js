$(document).ready(function () {

/*     Inicio de sesión de usuarios */

    $('#login-admin').on('submit', function (e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            dataType: 'json',
            url: $(this).attr('action'),
            error: function (request, error) {
                console.log(error);
            },
            success: function (data) {
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    Swal.fire(
                        'Correcto',
                        'Bienvenid@ ' +resultado.nombre+' ' +resultado.apellido+'!!',
                        'success'
                    )
                    setTimeout(function () {
                        window.location.href = 'admin.php';
                    }, 2000);
                } else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario o password incorrecto',
                        footer: 'Intenta nuevamente'
                      })
                }
            }
        })
    });

    
});



/* ********* CRUD */

// Add Record
function addRecord() {
     // get values
    
    var username = $("#username").val();
    var password = $("#password").val();
    var nombre_usuario = $("#nombre_usuario").val();
    var apellido_usuario = $("#apellido_usuario").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var sucursal = $("#sucursal").val();
    var permiso = $("#permiso").val(); 

    // Add record
    $.post("functions/php/CRUD_Login.php", {
        funcion: "addRecord", 
        username: username,
        password: password,
        nombre_usuario: nombre_usuario,
        apellido_usuario: apellido_usuario,
        telefono: telefono,
        direccion: direccion,
        sucursal: sucursal,
        permiso: permiso,
    }, function (data, status) {
        // close the popup
            var datos = JSON.parse(data);
            if (datos.respuesta == "exito") {
                Swal.fire(
                    'Correcto',
                    'Usuario añadido correctamente',
                    'success'
                );
                // Hide Modal
                $("#add_new_record_modal").modal("hide");
                // read records again 
                readRecords();

                // clear fields from the popup
                $("#username").val("");
                $("#password").val("");
                $("#passwordConfirm").val("");
                $("#nombre_usuario").val("");
                $("#apellido_usuario").val("");
                $("#telefono").val("");
                $("#direccion").val("");
                $("#sucursal").val("");
                $("#permiso").val("");

            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El usuario no pudo ser añadido',
                    footer: 'Intenta nuevamente'
                  })
            }
            

    }); 
}

// READ records
function readRecords() {

    $.get("functions/php/CRUD_Login.php", {
        funcion: 'readRecords'
    }, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    Swal.fire({
        title: '¿Confirmas la eliminación del usuario?',
        text: "La acción no podrá ser revertida",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.post("functions/php/CRUD_Login.php", {
                funcion: "DeleteUser",
                id: id
            },
                function (data, status) {
                    var datos = JSON.parse(data);
                    if (datos.respuesta == "exito") {
                        // reload Users by using readRecords();
                        Swal.fire('Correcto!', 'Usuario eliminado', 'success')
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


function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("functions/php/CRUD_Login.php", {
            funcion: "GetUserDetails", 
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            
            $("#usernameEdit").val(user.consulta.username);
            //$("#passwordEdit").val(user.consulta.password);
            $("#nombre_usuarioEdit").val(user.consulta.nombre_usuario);
            $("#apellido_usuarioEdit").val(user.consulta.apellido_usuario);
            $("#telefonoEdit").val(user.consulta.telefono);
            $("#direccionEdit").val(user.consulta.direccion);
            sucursalID = user.consulta.sucursal_id;
            permisoID = user.consulta.permiso_id;
            valores("consultaSUC", "sucursalEdit", sucursalID);
            valores("consultaPERM", "permisoEdit", permisoID);
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var username = $("#usernameEdit").val();
    var password = $("#passwordEdit").val();
    var nombre_usuario = $("#nombre_usuarioEdit").val();
    var apellido_usuario = $("#apellido_usuarioEdit").val();
    var telefono = $("#telefonoEdit").val();
    var direccion = $("#direccionEdit").val();
    var sucursal = $("#sucursalEdit").val();
    var permiso = $("#permisoEdit").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("functions/php/CRUD_Login.php", {
            funcion: "UpdateUserDetails",
            id: id,
            username: username,
            password: password,
            nombre_usuario: nombre_usuario,
            apellido_usuario: apellido_usuario,
            telefono: telefono,
            direccion: direccion,
            sucursal: sucursal,
            permiso: permiso
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

    var new_user=document.getElementById('new_user');
    new_user.addEventListener("click", function () {
        valores("consultaSUC", "sucursal", 1);
        valores("consultaPERM", "permiso", 1);
    })

    $('#change_pass').hide();
    $("#customSwitch1").on('change', function() {  
        if($("#customSwitch1").is(':checked')) {  
            $('#change_pass').show();
        } else {  
            $('#change_pass').hide();
        }  
    }); 
});


//Validate Form add User

$("#addForm").validate({
  rules: {
				username: {
					required: true,
					minlength: 5
                },
                nombre_usuario: {
					required: true,
					minlength:3
                },
                apellido_usuario: {
					required: true,
					minlength: 3
                },
                telefono: {
					required: true,
                    minlength: 8,
                    maxlength: 10,
                    number: true
                },
                direccion: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 8
				},
				passwordConfirm: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				}
			},
			messages: {
				
				username: {
					required: "Ingresa el nombre de usuario",
					minlength: "El username debe contener al menos 5 letras"
                },
                nombre_usuario: {
					required: "Ingresa el nombre",
					minlength: "El nombre debe tener por lo menos 3 letras"
                },
                apellido_usuario: {
					required: "Ingresa el apellido",
					minlength: "El apellido debe tener por lo menos 3 letras"
                },
                telefono: {
					required: "Ingresa el telefono",
                    minlength: "El teléfono debe ser por lo menos de 8 dígitos",
                    maxlength: "Dígitos permitidos excedidos",
                    number: "Ingresa un número válido"
                },
                direccion: {
					required: "Ingresa la dirección",
					minlength: "La dirección es demasiado corta"
				},
				password: {
					required: "Ingresa una contraseña",
					minlength: "La contraseña debe tener 8 letras y/o caracteres"
				},
				passwordConfirm: {
                    required: "Repite la contraseña",
                    minlength: "La contraseña debe tener 8 letras y/o caracteres",
					equalTo: "Las contraseñas no coinciden"
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

$("#editForm").validate({
    rules: {
                  usernameEdit: {
                      required: true,
                      minlength: 5
                  },
                  nombre_usuarioEdit: {
                      required: true,
                      minlength:3
                  },
                  apellido_usuarioEdit: {
                      required: true,
                      minlength: 3
                  },
                  telefonoEdit: {
                      required: true,
                      minlength: 8,
                      maxlength: 10,
                      number: true
                  },
                  direccionEdit: {
                      required: true,
                      minlength: 5
                  },
                  passwordEdit: {
                      minlength: 8,
                      required: function (element){
                          return $("#customSwitch1").is(':checked');
                      }
                  },
                  passwordConfirmEdit: {
                    required: function (element){
                        return $("#customSwitch1").is(':checked');
                    },
                      minlength: 8,
                      equalTo: "#passwordEdit"
                  }
              },
              messages: {
                  
                  usernameEdit: {
                      required: "Ingresa el nombre de usuario",
                      minlength: "El username debe contener al menos 5 letras"
                  },
                  nombre_usuarioEdit: {
                      required: "Ingresa el nombre",
                      minlength: "El nombre debe tener por lo menos 3 letras"
                  },
                  apellido_usuarioEdit: {
                      required: "Ingresa el apellido",
                      minlength: "El apellido debe tener por lo menos 3 letras"
                  },
                  telefonoEdit: {
                      required: "Ingresa el telefono",
                      minlength: "El teléfono debe ser por lo menos de 8 dígitos",
                      maxlength: "Dígitos permitidos excedidos",
                      number: "Ingresa un número válido"
                  },
                  direccionEdit: {
                      required: "Ingresa la dirección",
                      minlength: "La dirección es demasiado corta"
                  },
                  passwordEdit: {
                      required: "Ingresa una contraseña",
                      minlength: "La contraseña debe tener 8 letras y/o caracteres"
                  },
                  passwordConfirmEdit: {
                      required: "Repite la contraseña",
                      minlength: "La contraseña debe tener 8 letras y/o caracteres",
                      equalTo: "Las contraseñas no coinciden"
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
                UpdateUserDetails();
            }, 
}  
);

