<?php
error_reporting(E_ALL ^ E_NOTICE);
$funcionPOST= $_POST['funcion'];
$funcionGET= $_GET['funcion'];

//add Record
if(isset($_POST) && $funcionPOST == "addRecord"){
    // get values 

    $proveedor_name = $_POST['proveedor_name'];
    $dir_proveedor_add = $_POST['dir_proveedor_add'];
    $des_proveedor_add = $_POST['des_proveedor_add'];

    try{
        // include Database connection file
        include_once("../../../dist/db/functions.php");
        $query = "INSERT INTO proveedores(nombre_proveedor, direccion_proveedor, descripcion_proveedor) VALUES('$proveedor_name', '$dir_proveedor_add', '$des_proveedor_add')";
        
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
    include_once('readRecordsProveedores.php');
    $connect->close();
} 
//Delete Records
elseif($funcionPOST == "Delete" && isset($_POST['id']) && isset($_POST['id']) != "")
{

    // get user id
    $proveedor_id = $_POST['id'];
    $mat = "";
    $prod = "";
    // delete User
    try{
        include_once("../../../dist/db/functions.php");
        $queryMat = "UPDATE materiales SET id_proveedor= NULL WHERE id_proveedor = '$proveedor_id'";

        $queryProd = "UPDATE productos SET id_proveedor= NULL WHERE id_proveedor = '$proveedor_id'";

        if ($connect->query($queryMat) === TRUE) {
            $response = [
                'material' => 'exito'
            ];
          }
        if ($connect->query($queryProd) === TRUE) {
            $response = [
                'producto' => 'exito'
            ];
          }
        
        $query = "DELETE FROM proveedores WHERE proveedor_id = '$proveedor_id'";

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
        $proveedor_id = $_POST['id'];

        // Get User Details
        include_once("../../../dist/db/functions.php");
        try{
            $query = "SELECT * FROM proveedores WHERE proveedor_id = '$proveedor_id' ";

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
        $proveedor_name_edit = $_POST['proveedor_name_edit'];
        $dir_proveedor_edit = $_POST['dir_proveedor_edit'];
        $des_proveedor_edit = $_POST['des_proveedor_edit'];


        // Update User details
        try{
            include_once("../../../dist/db/functions.php");
            $query = "UPDATE proveedores SET nombre_proveedor='$proveedor_name_edit', direccion_proveedor='$dir_proveedor_edit', descripcion_proveedor='$des_proveedor_edit' WHERE proveedor_id = '$id'";

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