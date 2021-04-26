$(document).ready(function () {
    //llenar();
});
$('#btnAbrirAgregar').click(function () {
    $('#modalAgregar').modal('show');
});



function limpiar(){
	$('#nombre').val('');
	$('#direccion').val('');
	$('#telefono').val('');
    $('#apellidos').val('');

}