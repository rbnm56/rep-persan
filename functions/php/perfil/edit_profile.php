<?php
error_reporting(E_ALL ^ E_NOTICE);
$funcionPOST= $_POST['funcion'];
include_once("../../../dist/db/functions.php");

if($funcionPOST == "UpdateUserDetails"){

// check request
    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $apellido_usuario = $_POST['apellido_usuario'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $sucursal = ((int)$_POST['sucursal']);
        $permiso = ((int)$_POST['permiso']);
        
        if ($password != null){
            $opciones = array(
                'cost' => 12
            );

            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        }

        // Update User details
        try{
            if ($password != null){
                $query = "UPDATE usuarios SET username='$username', password = '$password_hashed', nombre_usuario='$nombre_usuario', username='$username', apellido_usuario='$apellido_usuario', telefono= $telefono, direccion= '$direccion', id_sucursal = $sucursal, id_permiso= $permiso WHERE usuario_id = $id";
            }
            else{
                $query = "UPDATE usuarios SET username= '$username', nombre_usuario= '$nombre_usuario', username= '$username', apellido_usuario= '$apellido_usuario', telefono= $telefono, direccion= '$direccion', id_sucursal = $sucursal, id_permiso= $permiso WHERE usuario_id = $id";
            }
            if ($connect->query($query) === TRUE) {
                $response = [
                    'respuesta' => 'exito'
                ];
              } else {
                $response = array(
                    'respuesta' => 'error'
                );
              }
            echo json_encode($response);
            $connect->close();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage(); 
        }
    }
}
else if($funcionPOST == "readRecords"){
    // include Database connection file 

$id = $_POST['id'];

try{ 
    $query = "SELECT * FROM usuarios LEFT JOIN sucursales ON usuarios.id_sucursal = sucursales.sucursal_id LEFT JOIN permisos ON usuarios.id_permiso = permisos.permiso_id WHERE usuario_id = $id";

    $response = array();

            //Resultados de consulta ID
            if (!$result = mysqli_query($connect, $query)) {
                exit(mysqli_error($connect));
            }
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $response['consulta'] = $row;
                }
                $connect->close(); 
            }
        
            else
            {
                $response['status'] = 200;
                $response['message'] = "Data not found!";
            }
            
            // display JSON data

            echo json_encode($response);
        }catch(Exception $e){
            echo "Error: " . $e->getMessage(); 
        }
    }

?>