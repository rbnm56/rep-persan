<?php
include("../../../dist/db/functions.php");
include("../../../functions/php/sesiones.php");
$array_response = array('exito' => FALSE, 'mensaje' => 'Error al insertar los datos');

if (isset($_POST) && !empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['direccion'])) {
    /*$nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $preferente = $_POST['preferente'];
    $mayorista = $_POST['mayorista'];*/


    try {
        //$res = insertar("id_usuario, correo_cliente, nombre_cliente, apellido_cliente,  telefono, direccion_cliente, es_preferencial, es_mayorista", "cliente", "$se_id_usuario, '$correo', '$nombre', '$apellidos', $telefono, '$direccion', $preferente, $mayorista", false);

        if ($res) {
            $array_response['exito'] = TRUE;
            $array_response['mensaje'] = " Sus datos han sido insertados correctamente ";
        }
        echo json_encode($array_response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    $array_response = array('exito' => FALSE, 'mensaje' => 'Faltan datos necesarios');
    echo json_encode($array_response);
}
