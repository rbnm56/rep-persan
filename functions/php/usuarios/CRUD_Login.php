<?php
error_reporting(E_ALL ^ E_NOTICE);
$funcionPOST= $_POST['funcion'];
$funcionGET= $_GET['funcion'];

//add Record
if(isset($_POST) && $funcionPOST == "addRecord"){
    // get values 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $apellido_usuario = $_POST['apellido_usuario'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $sucursal = ((int)$_POST['sucursal']);
    $permiso = ((int)$_POST['permiso']);
    
    $opciones = array(
        'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try{
        // include Database connection file
        include_once("../../../dist/db/functions.php");
        $query = "INSERT INTO usuarios(username, password, nombre_usuario, apellido_usuario, telefono, direccion, id_sucursal, id_permiso) VALUES('$username', '$password_hashed', '$nombre_usuario', '$apellido_usuario', '$telefono', '$direccion', $sucursal, $permiso)";
        
        if ($connect->query($query) == TRUE) {
            $response = [
                'respuesta' => 'exito'
            ];
          } else {
            $response = [
                'respuesta' => 'error'
            ];
          }
        echo json_encode($response);

        $connect->close();
   }catch (Exception $e){
       // echo "Error: " . $e->getMessage();
    }
    
}
//show Records
elseif($funcionGET == "readRecords"){
    include_once('readRecords.php');
    $connect->close();
} 
//Delete Records
elseif($funcionPOST == "DeleteUser" && isset($_POST['id']) && isset($_POST['id']) != "")
{

    // get user id
    $user_id = $_POST['id'];
    // delete User
    try{
        include_once("../../../dist/db/functions.php");
        $query = "DELETE FROM usuarios WHERE usuario_id = '$user_id'";

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
//Show records to Edit
else if($funcionPOST == "GetUserDetails"){

// check request
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get User ID
        $user_id = $_POST['id'];

        // Get User Details
        include_once("../../../dist/db/functions.php");
        try{
            $query = "SELECT * FROM usuarios INNER JOIN sucursales ON usuarios.id_sucursal = sucursales.sucursal_id INNER JOIN permisos ON usuarios.id_permiso = permisos.permiso_id WHERE usuario_id = '$user_id' ";

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
    else
    {
        $response['status'] = 200;
        $response['message'] = "Invalid Request!";
    }
} 
// Update records
elseif($funcionPOST == "UpdateUserDetails"){

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
        $sucursal = ((int)$_POST['sucursal']) +1;
        $permiso = ((int)$_POST['permiso']) +1;
    
        $opciones = array(
            'cost' => 12
        );

        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);


        // Update User details
        try{
            include_once("../../../dist/db/functions.php");
            $query = "UPDATE usuarios SET username='$username', password='$password_hashed', nombre_usuario='$nombre_usuario', username='$username', apellido_usuario='$apellido_usuario', telefono='$telefono', direccion='$direccion', id_sucursal = '$sucursal', id_permiso='$permiso' WHERE usuario_id = '$id'";

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
// Log in
elseif(isset($_POST['login-admin'])){

    $username = $_POST['username'];
    $password_local = $_POST['password'];
    try{
        include_once '../../../dist/db/functions.php';
        $stmt = $connect->prepare("SELECT usuario_id, username, password, nombre_usuario, apellido_usuario FROM usuarios WHERE username = '$username'");
        $stmt->execute();
        $stmt->bind_result($usuario_id, $username, $password, $nombre_usuario, $apellido_usuario);
        if($stmt->affected_rows){
            $existe = $stmt->fetch();
            if($existe){ 
                if (password_verify($password_local, $password)){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['nombre'] = $nombre_usuario;
                    $_SESSION['id'] = $usuario_id;
                    $respuestaLogin = [
                        "respuesta" => "exitoso",
                        "usuario" => $username,
                        "nombre" => $nombre_usuario,
                        "apellido" => $apellido_usuario
                        
                    ];
                } else{
                    $respuestaLogin = [
                        'respuesta' => 'Error'
                    ];
                };
            }else{
                $respuestaLogin = [
                    'respuesta' => 'Error'
                ];
            }
        }

        $stmt->close();
        $connect->close();
      
    } catch (Exception $e){
        echo "Error: " . $e->getMessage();
    }
 
    die(json_encode($respuestaLogin));
    
}

?> 