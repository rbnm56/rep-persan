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
                console.log(resultado);
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
    /* var sucursal = $("#sucursal").val();
    var permiso = $("#permiso").val(); */
    
    // Add record
    $.post("functions/php/CRUD_Login.php", {
        funcion: "addRecord", 
        username: username,
        password: password,
        nombre_usuario: nombre_usuario,
        apellido_usuario: apellido_usuario,
        telefono: telefono,
        direccion: direccion,
        /* sucursal: sucursal,
		permiso: permiso */
    }, function (data, status) {
        // close the popup
        console.log(status);
        $("#add_new_record_modal").modal("hide");

        // read records again 
        readRecords();
        

        // clear fields from the popup
        $("#username").val("");
        $("#password").val("");
        $("#nombre_usuario").val("");
        $("#apellido_usuario").val("");
        $("#telefono").val("");
        $("#direccion").val("");
        /* $("#sucursal").val("");
        $("#permiso").val(""); */
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
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("functions/php/CRUD_Login.php", {
                funcion: "DeleteUser",
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
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
            
            $("#usernameEdit").val(user.username);
            $("#passwordEdit").val(user.password);
            $("#nombre_usuarioEdit").val(user.nombre_usuario);
            $("#apellido_usuarioEdit").val(user.apellido_usuario);
            $("#telefonoEdit").val(user.telefono);
            $("#direccionEdit").val(user.direccion);
            /* $("#sucursalEdit").val(user.sucursal);
            $("#permisoEdit").val(user.permiso); */
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
  /*   var sucursal = $("#sucursalEdit").val();
    var permiso = $("#permisoEdit").val(); */

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
         /*    sucursal: sucursal,
            permiso: permiso */
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});