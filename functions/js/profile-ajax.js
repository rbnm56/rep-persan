$(document).ready(function () {
    readRecords();
    $('#pass_profile_div').hide();
    $('#switch_profile_div').hide();
    $('#button_profile_edit').hide();
    $("#Switch_profile_edit").on('change', function () {
        if ($("#Switch_profile_edit").is(':checked')) {
            //Llama a la funcion para editar el perfil
            edit_profile_true();
        } else {
            //Si cambia el switch, deshabilita el edit
            
            edit_profile_false();
        }
    })
});

function readRecords() {
    id = $("#hidden_id_profile").val();
    $.post("functions/php/perfil/edit_profile.php", {
            funcion: "readRecords", 
            id: id
        },
        function (data, status) {
            // PARSE json data
            
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            if (user.status != 200) {
                $("#username_left").text(user.consulta.username);
                //$("#passwordEdit").val(user.consulta.password);
                $("#nombre_left").text(user.consulta.nombre_usuario + ' ' + user.consulta.apellido_usuario);
                $("#permiso_left").text(user.consulta.nombre_permiso);
                $("#inputUsername").val(user.consulta.username);
                $("#inputName").val(user.consulta.nombre_usuario);
                $("#inputApellido").val(user.consulta.apellido_usuario);
                $("#inputTelefono").val(user.consulta.telefono);
                $("#inputDireccion").val(user.consulta.direccion);
                sucursalID = user.consulta.sucursal_id;
                permisoID = user.consulta.permiso_id;
                valores("consultaSUC", "inputSucursal", sucursalID);
                valores("consultaPERM", "inputPermiso", permisoID);
               
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Se produjo un error',
                    footer: 'Intenta nuevamente'
                  })
            }
        }
    );
}

function edit_profile_true() {
    //Muestra el boton para enviar la edicion
    readRecords();
    $('#switch_profile_div').show();
    $('#button_profile_edit').show();
    //Obtiene el id del usuario y el permiso
    id = $('#hidden_id_profile').val();
    id_permiso = $('#inputPermiso').val();

    $("#pass_profile_switch").on('change', function () {
        if ($("#pass_profile_switch").is(':checked')) {
            //Llama a la funcion para editar el perfil
            $('#pass_profile_div').show();
            $('#inputPassword').prop('disabled', false);
            $('#inputPassword_repeat').prop('disabled', false);
        } else {
            //Si cambia el switch, deshabilita el edit
            
            $('#pass_profile_div').hide();
        }
    })

    //Si el permiso es de administrador, permite editar el username, la sucursal y los permisos
    if (id_permiso == 1) {
        id_sucursal = $('#inputSucursal').val();
        //LLamada a la funcion para mostrar todas las sucursales y permisos
        valores("consultaSUC", "inputSucursal", id_sucursal);
        valores("consultaPERM", "inputPermiso", id_permiso);

        $('#inputUsername').prop('disabled', false);
        $('#inputSucursal').prop('disabled', false);
        $('#inputPermiso').prop('disabled', false);
    }
    $('#inputName').prop('disabled', false);
    $('#inputApellido').prop('disabled', false);
    $('#inputTelefono').prop('disabled', false);
    $('#inputDireccion').prop('disabled', false);
}


function edit_profile_false() {
    //oculta el boton para enviar la edicion
    $('#button_profile_edit').hide();
    $('#switch_profile_div').hide();
    $('#pass_profile_div').hide();
    $("#pass_profile_switch").prop("checked", false);

    id_permiso = $('#inputPermiso').val();

    $('#inputUsername').prop('disabled', true);
    $('#inputSucursal').prop('disabled', true);
    $('#inputPermiso').prop('disabled', true);
    $('#inputName').prop('disabled', true);
    $('#inputApellido').prop('disabled', true);
    $('#inputTelefono').prop('disabled', true);
    $('#inputDireccion').prop('disabled', true);
    readRecords();
    
}

function UpdateUserProfile() {
    var username = $("#inputUsername").val();
    var sucursal = $("#inputSucursal").val();
    var permiso = $("#inputPermiso").val();
    var password = $("#inputPassword").val();
    var nombre_usuario = $("#inputName").val();
    var apellido_usuario = $("#inputApellido").val();
    var telefono = $("#inputTelefono").val();
    var direccion = $("#inputDireccion").val();

    // get hidden field value
    id = $('#hidden_id_profile').val();

    // Update the details by requesting to the server using ajax
    $.post("functions/php/perfil/edit_profile.php", {
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
                $('#inputUsername').removeClass('is-valid');
                $('#inputSucursal').removeClass('is-valid');
                $('#inputPermiso').removeClass('is-valid');
                $('#inputName').removeClass('is-valid');
                $('#inputApellido').removeClass('is-valid');
                $('#inputTelefono').removeClass('is-valid');
                $('#inputDireccion').removeClass('is-valid');

                $("#Switch_profile_edit").prop("checked", false);
                edit_profile_false();

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
};


$("#editForm_profile").validate({
    rules: {
                  inputUsername: {
                      required: true,
                      minlength: 5
                  },
                  inputName: {
                      required: true,
                      minlength:3
                  },
                  inputApellido: {
                      required: true,
                      minlength: 3
                  },
                  inputTelefono: {
                      required: true,
                      minlength: 8,
                      maxlength: 10,
                      number: true
                  },
                  inputDireccion: {
                      required: true,
                      minlength: 5
                  },
                  inputPassword: {
                      minlength: 8,
                      required: function (element){
                          return $("#pass_profile_switch").is(':checked');
                      }
                  },
                  inputPassword_repeat: {
                    required: function (element){
                        return $("#pass_profile_switch").is(':checked');
                    },
                      minlength: 8,
                      equalTo: "#inputPassword"
                  }
              },
              messages: {
                  
                  inputUsername: {
                      required: "Ingresa el nombre de usuario",
                      minlength: "El nombre de usuario es muy corto"
                  },
                  inputName: {
                      required: "Ingresa el nombre",
                      minlength: "El nombre es muy corto"
                  },
                  inputApellido: {
                      required: "Ingresa el apellido",
                      minlength: "El apellido es muy corto"
                  },
                  inputTelefono: {
                      required: "Ingresa el telefono",
                      minlength: "El teléfono es incorrecto",
                      maxlength: "Dígitos permitidos excedidos",
                      number: "Ingresa un número válido"
                  },
                  inputDireccion: {
                      required: "Ingresa la dirección",
                      minlength: "La dirección es muy corta"
                  },
                  inputPassword: {
                      required: "Ingresa una contraseña",
                      minlength: "La contraseña debe tener 8 letras y/o caracteres"
                  },
                  inputPassword_repeat: {
                      required: "Repite la contraseña",
                      minlength: "La contraseña debe tener 8 letras y/o caracteres",
                      equalTo: "Las contraseñas no coinciden"
                  }, 
              },
              errorElement: 'span',
              errorPlacement: function (error, element) {

                  if ($("#Switch_profile_edit").is(':checked')) { 
                      error.addClass('invalid-feedback');
                      element.closest('.form-group').append(error);
                  }
                  $("#Switch_profile_edit").on('change', function () {
                    if ($("#Switch_profile_edit").is(':checked')) {
                        
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    } else {
                        element.removeClass('is-invalid');
                        error.empty();
                        
                    }
                })
              },
              highlight: function (element, errorClass, validClass) {
                  
                  $(element).addClass('is-invalid');
                  
              },
              unhighlight: function (element, errorClass, validClass) {
                  
                  /* $(element).removeClass('is-invalid');
                  $(element).addClass('is-valid'); */
                  if ($("#Switch_profile_edit").is(':checked')) { 
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                }
                $("#Switch_profile_edit").on('change', function () {
                  if ($("#Switch_profile_edit").is(':checked')) {
                    validClass.empty();
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                  } else {

                    $(element).removeClass('is-invalid');
                    $(element).removeClass('is-valid');
                      
                  }
              })
              },
              submitHandler: function (form) {
                UpdateUserProfile();
            }, 
}  
);
