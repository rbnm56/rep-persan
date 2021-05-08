$(document).ready(function () {
    llenar();
});
$('#btnAbrirAgregar').click(function () {
    $('#modalAgregar').modal('show');
});
$('#btnAbrirEditar').click(function () {
    $('#modalEditar').modal('show');
});
$('#btnGuardar').click(function (e) {
    $('#statusMsgClient').hide();
    var nombre = $("#nombre").val();
    var apellidos = $("#apellidos").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var direccion = $("#direccion").val();
    var preferente = $("input[name='preferente']:checked").val();
    var mayorista = $("input[name='mayorista']:checked").val();

    if (nombre.trim() == '') {
        $('#statusMsgClient').addClass('alert alert-warning').html("Escriba el nombre del cliente.").show();
        return false;
    }
    if (apellidos.trim() == '') {
        $('#statusMsgClient').addClass('alert alert-warning').html("Escriba los apellidos del cliente.").show();
        return false;
    }
    if (telefono.trim() == '') {
        $('#statusMsgClient').addClass('alert alert-warning').html("Escriba el teléfono cliente").show();
        return false;
    }
    if (correo != '') {
        if (validateEmail(correo) == false) {
            $('#statusMsgClient').addClass('alert alert-warning').html("Ingrese un correo valido.").show();
            return false;
        }
    }
    if (direccion.trim() == '') {
        $('#statusMsgClient').addClass('alert alert-warning').html("Escriba la dirección cliente").show();
        return false;
    }

    $.post("functions/php/clientes/nuevo.php", {
        nombre: nombre,
        apellidos: apellidos,
        telefono: telefono,
        correo: correo,
        telefono: telefono,
        direccion: direccion,
        preferente: preferente,
        mayorista: mayorista
    },
        function (respuesta) {
            resp = JSON.parse(respuesta);
            if (resp.exito) {
                limpiar();
                llenar();
                Swal.fire({
                    title: resp.mensaje,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500
                });
                $("#modalAgregar").modal("hide");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: resp.mensaje,
                    footer: 'Intenta nuevamente'
                })
            }
        })
});
$('#btnEditar').click(function (e) {
    $('#statusMsgClientEditar').hide();
    var nombre = $("#nombreEditar").val();
    var apellidos = $("#apellidosEditar").val();
    var telefono = $("#telefonoEditar").val();
    var correo = $("#correoEditar").val();
    var direccion = $("#direccionEditar").val();
    var preferente = $("input[name='preferente']:checked").val();
    var mayorista = $("input[name='mayorista']:checked").val();
    var id_cliente = $("#id_cliente").val();

    if (nombre.trim() == '') {
        $('#statusMsgClientEditar').addClass('alert alert-warning').html("Escriba el nombre del cliente.").show();
        return false;
    }
    if (apellidos.trim() == '') {
        $('#statusMsgClientEditar').addClass('alert alert-warning').html("Escriba los apellidos del cliente.").show();
        return false;
    }
    if (telefono.trim() == '') {
        $('#statusMsgClientEditar').addClass('alert alert-warning').html("Escriba el teléfono cliente").show();
        return false;
    }
    if (correo != '') {
        if (validateEmail(correo) == false) {
            $('#statusMsgClientEditar').addClass('alert alert-warning').html("Ingrese un correo valido.").show();
            return false;
        }
    }
    if (direccion.trim() == '') {
        $('#statusMsgClientEditar').addClass('alert alert-warning').html("Escriba la dirección cliente").show();
        return false;
    }

    $.post("functions/php/clientes/editar.php", {
        nombre: nombre,
        apellidos: apellidos,
        telefono: telefono,
        correo: correo,
        telefono: telefono,
        direccion: direccion,
        preferente: preferente,
        mayorista: mayorista,
        id: id_cliente
    },
        function (respuesta) {
            resp = JSON.parse(respuesta);
            if (resp.exito) {
                limpiar();
                llenar();
                Swal.fire({
                    title: resp.mensaje,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500
                });
                $("#modalEditar").modal("hide");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: resp.mensaje,
                    footer: 'Intenta nuevamente'
                })
            }
        })
});
function detallesCliente(id) {
    // Add User ID to the hidden field for furture usage
    $("#id_cliente").val(id);
    $.post("functions/php/clientes/buscar.php", {
        id: id
    },
        function (data, status) {
            // PARSE json data
            var cliente = JSON.parse(data);

            $("#nombreEditar").val(cliente.nombre_cliente);
            $("#apellidosEditar").val(cliente.apellido_cliente);
            $("#telefonoEditar").val(cliente.telefono);
            $("#correoEditar").val(cliente.correo_cliente);
            $("#direccionEditar").val(cliente.direccion_cliente);
            //$("input[name='preferente']:checked").val();
            //$("input[name='mayorista']:checked").val();*/
        }
    );
    // Open modal popup
    $("#modalEditar").modal("show");
}
function eliminarCliente(id) {
    Swal.fire({
        title: '¿Seguro que quiere eliminar al cliente?',
        text: "¡No se podrá revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("functions/php/clientes/eliminar.php", {
                id: id
            },
                function (respuesta) {
                    resp = JSON.parse(respuesta);
                    if (resp.exito) {
                        llenar();
                        Swal.fire({
                            title: resp.mensaje,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: resp.mensaje,
                            footer: 'Intenta nuevamente'
                        })
                    }
                    readRecords();
                }
            );
        }
    })
}
function llenar() {
    $.get("functions/php/clientes/consultar_clientes.php", {
    }, function (data, status) {
        $("#contenido").html(data);
    });
}
function limpiar() {
    $('#nombre').val('');
    $('#direccion').val('');
    $('#telefono').val('');
    $('#apellidos').val('');
    $("#correo").val('');
    $('#statusMsgClient').hide();

}
function limpiarE() {
    $('#nombreEditar').val('');
    $('#direccionEditar').val('');
    $('#telefonoEditar').val('');
    $('#apellidosEditar').val('');
    $("#correoEditar").val('');
    $('#statusMsgClientEditar').hide();

}
function validateEmail(Email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(Email);
}