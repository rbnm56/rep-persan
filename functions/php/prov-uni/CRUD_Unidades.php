<?php
error_reporting(E_ALL ^ E_NOTICE);
$funcionPOST= $_POST['funcion'];
$funcionGET= $_GET['funcion'];

//add Record
if(isset($_POST) && $funcionPOST == "addRecord"){
    // get values 

    $material_name = $_POST['material_name'];
    $des_material_add = $_POST['des_material_add'];
    $proveedor_add = ((int)$_POST['proveedor_add']) + 1;

    try{
        // include Database connection file
        include_once("../../../dist/db/functions.php");
        $query = "INSERT INTO materiales(nombre_material, descripcion_material, id_proveedor) VALUES('$material_name', '$des_material_add', $proveedor_add)";
        
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
elseif($funcionPOST == "DeleteMaterial" && isset($_POST['id']) && isset($_POST['id']) != "")
{

    // get user id
    $material_id = $_POST['id'];
    // delete User
    try{
        include_once("../../../dist/db/functions.php");
        $query = "DELETE FROM materiales WHERE material_id = '$material_id'";

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
else if($funcionPOST == "GetMaterialDetails"){

// check request
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get User ID
        $material_id = $_POST['id'];

        // Get User Details
        include_once("../../../dist/db/functions.php");
        try{
            $query = "SELECT * FROM materiales INNER JOIN proveedores ON materiales.id_proveedor = proveedores.proveedor_id WHERE material_id = '$material_id' ";

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
elseif($funcionPOST == "UpdateMaterialDetails"){

// check request
    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $material_name_edit = $_POST['material_name_edit'];
        $des_material_edit = $_POST['des_material_edit'];
        $proveedor_edit = ((int)$_POST['proveedor_edit']) +1;

        // Update User details
        try{
            include_once("../../../dist/db/functions.php");
            $query = "UPDATE materiales SET nombre_material='$material_name_edit', descripcion_material='$des_material_edit', id_proveedor='$proveedor_edit' WHERE material_id = '$id'";

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

if(isset($_POST) && $funcionPOST == "addRecordProvider"){
    // get values 
    $provider_name_add = $_POST['provider_name_add'];
    $provider_dir_add = $_POST['provider_dir_add'];
    $provider_description_add = $_POST['provider_description_add'];

    try{

        // include Database connection file
        include_once("../../../dist/db/functions.php");
        $query = "INSERT INTO proveedores (nombre_proveedor, direccion_proveedor, descripcion_proveedor) VALUES('$provider_name_add','$provider_dir_add', '$provider_description_add')";
        
        if ($connect->query($query) == TRUE) {
            $response ['respuesta'] = "exito";
          } else {
            $response ['respuesta'] = "error";
          }
        echo json_encode($response);

        $connect->close();
   }catch (Exception $e){
       // echo "Error: " . $e->getMessage();
    }
    
}

?> 