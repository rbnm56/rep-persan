<?php
include("../../../dist/db/functions.php");
include("../../../functions/php/sesiones.php");
$array_response = array('exito' => FALSE, 'mensaje' => 'Error al eliminar al cliente');

if (isset($_POST) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $res = eliminar("cliente", "WHERE cliente_id=$id");

        if ($res) {
            $array_response['exito'] = TRUE;
            $array_response['mensaje'] = "Cliente eliminado correctamente. ";
        }
        echo json_encode($array_response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $array_response = array('exito' => FALSE, 'mensaje' => 'Faltan datos necesarios');
    echo json_encode($array_response);
}