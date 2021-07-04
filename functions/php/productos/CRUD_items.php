<?php
error_reporting(E_ALL ^ E_NOTICE);
$funcionPOST= $_POST['funcion'];
$funcionGET= $_GET['funcion'];

//add Record
if(isset($_POST) && $funcionPOST == "addRecordItem"){
    // get values 
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_description = $_POST['item_description'];
    $item_unity = ((int)$_POST['item_unity']) + 1;
    $item_provider = ((int)$_POST['item_provider']) + 1;
    
    try{
        // include Database connection file
        include_once("../../../dist/db/functions.php");
        $query = "INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, id_unidad, id_proveedor) VALUES('$item_name', '$item_description', '$item_price', '$item_unity', '$item_provider')";
        
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
elseif($funcionPOST == "DeleteItem" && isset($_POST['id']) && isset($_POST['id']) != "")
{

    // get user id
    $item_id = $_POST['id'];
    // delete User
    try{
        include_once("../../../dist/db/functions.php");
        $query = "DELETE FROM productos WHERE producto_id = '$item_id'";

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
else if($funcionPOST == "GetItemDetails"){

// check request
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get User ID
        $item_id = $_POST['id'];

        // Get User Details
        include_once("../../../dist/db/functions.php");
        try{
            $query = "SELECT * FROM productos INNER JOIN unidades ON productos.id_unidad = unidades.unidad_id INNER JOIN proveedores ON productos.id_proveedor = proveedores.proveedor_id WHERE producto_id = '$item_id' ";

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
elseif($funcionPOST == "UpdateItemDetails"){

// check request
    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_description = $_POST['item_description'];
        $item_unity = ((int)$_POST['item_unity']) +1;
        $item_provider = ((int)$_POST['item_provider']) +1;
    
        // Update User details
        try{
            include_once("../../../dist/db/functions.php");
            $query = "UPDATE productos SET nombre_producto='$item_name', descripcion_producto='$item_description', precio_producto='$item_price', id_unidad = '$item_unity', id_proveedor='$item_provider' WHERE producto_id = '$id'";

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