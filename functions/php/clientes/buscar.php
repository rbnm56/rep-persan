<?php
include("../../../dist/db/functions.php");
include("../../../functions/php/usuarios/sesiones.php");
$array_response = array('exito' => FALSE, 'mensaje' => '');
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $result = buscar("*", "cliente", "WHERE cliente_id=$id", false);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response = $row;
            }
            echo json_encode($response);
        } else {
            $array_response['exito'] = false;
            $array_response['mensaje'] = "Datos de cliente no encontrados";
            echo json_encode($array_response);
        }
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $array_response['exito'] = false;
    $array_response['mensaje'] = "Datos invalidos";
    echo json_encode($array_response);
}
