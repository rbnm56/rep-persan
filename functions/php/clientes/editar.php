<?php
include("../../../dist/db/functions.php");
include("../../../functions/php/sesiones.php");
$array_response = array('exito' => FALSE, 'mensaje' => 'Error al actualizar los datos');

if (isset($_POST) && !empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['direccion'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $preferente = $_POST['preferente'];
    $mayorista = $_POST['mayorista'];
    $id = $_POST['id'];


    try {
        $res = actualizar("correo_cliente='$correo', nombre_cliente='$nombre', apellido_cliente='$apellidos',  telefono=$telefono, direccion_cliente='$direccion', es_preferencial=$preferente, es_mayorista=$mayorista", "cliente", "WHERE cliente_id=$id", false);

        if ($res) {
            $array_response['exito'] = TRUE;
            $array_response['mensaje'] = "Los datos del cliente han sido actualizados correctamente ";
        }
        echo json_encode($array_response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $array_response = array('exito' => FALSE, 'mensaje' => 'Faltan datos necesarios');
    echo json_encode($array_response);
}
