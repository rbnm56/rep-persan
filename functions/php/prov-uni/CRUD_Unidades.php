<?php
error_reporting(E_ALL ^ E_NOTICE);
$funcionPOST= $_POST['funcion'];
$funcionGET= $_GET['funcion'];

//add Record
if(isset($_POST) && $funcionPOST == "addRecord"){
    // get values 

    $unidad_name_add = $_POST['unidad_name_add'];
    $des_unidad_add = $_POST['des_unidad_add'];

    try{
        // include Database connection file
        include_once("../../../dist/db/functions.php");
        $query = "INSERT INTO unidades (nombre_unidad, descripcion_unidad) VALUES('$unidad_name_add', '$des_unidad_add')";
        
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
    include_once('readRecordsUnidades.php');
    $connect->close();
} 
//Delete Records
elseif($funcionPOST == "Delete" && isset($_POST['id']) && isset($_POST['id']) != "")
{

    // get user id
    $unidad_id = $_POST['id'];
    // delete User
    try{
        include_once("../../../dist/db/functions.php");

        $queryProd = "UPDATE productos SET id_unidad= NULL WHERE id_unidad = '$unidad_id'";

        if ($connect->query($queryProd) === TRUE) {
            $response = [
                'producto' => 'exito'
            ];
          }
        $query = "DELETE FROM unidades WHERE unidad_id = '$unidad_id'";

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
else if($funcionPOST == "GetDetails"){

// check request
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get User ID
        $unidad_id = $_POST['id'];

        // Get User Details
        include_once("../../../dist/db/functions.php");
        try{
            $query = "SELECT * FROM unidades WHERE unidad_id = '$unidad_id' ";

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
elseif($funcionPOST == "UpdateDetails"){

// check request
    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $unidad_name_edit = $_POST['unidad_name_edit'];
        $des_unidad_edit = $_POST['des_unidad_edit'];

        // Update User details
        try{
            include_once("../../../dist/db/functions.php");
            $query = "UPDATE unidades SET nombre_unidad='$unidad_name_edit', descripcion_unidad='$des_unidad_edit' WHERE unidad_id = '$id'";

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

?> 