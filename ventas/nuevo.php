<?php
include_once 'functions/php/sesiones.php';
include_once 'dist/db/functions.php';
$array_response = array('exito' => FALSE, 'mensaje' => 'Error al insertar los datos');

if (isset($_POST)) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $preferente = $_POST['preferente'];
    $mayorista = $_POST['mayorista'];


    try {
        $res = insertar("id_usuario, correo_cliente, nombre_cliente, apellido_cliente, direccion_cliente, es_preferencial, es_mayorista", "cliente", "$se_id_usuario, 
        '$correo', '$nombre', '$apellidos', '$direccion', $preferente, $mayorista", true);

        if ($res) {
            $array_response['exito'] = TRUE;
            $array_response['mensaje'] = " Sus datos han sido insertados correctamente ";
        }
        echo json_encode($array_response);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
