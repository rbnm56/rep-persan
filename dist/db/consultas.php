<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $funcionPOST= $_POST['funcion'];
    $id= $_POST['id'];

    include_once("functions.php");

    if(isset($_POST) && $funcionPOST == "consultaSUC"){

        $query = "SELECT sucursal_id, nombre_sucursal FROM sucursales";

        //Resultados de consulta SUCURSALES
        if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id'][$i] = $row['sucursal_id'];
                $response ['nombre'][$i] = $row['nombre_sucursal'];
            $i++;
            }
            $connect->close();
        }

        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }

    if(isset($_POST) && $funcionPOST == "consultaPERM"){

        $queryPERM = "SELECT permiso_id, nombre_permiso FROM permisos";

        //Resultados de consulta PERMISOS
        if (!$result= mysqli_query($connect, $queryPERM)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id'][$i] = $row['permiso_id'];
                $response ['nombre'][$i] = $row['nombre_permiso'];
            $i++;
            }
            $connect->close(); 
        }

        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        echo json_encode($response);
    }

    if(isset($_POST) && $funcionPOST == "consultaUnidad"){

        $queryUnidad = "SELECT unidad_id, nombre_unidad FROM unidades";

        //Resultados de consulta PERMISOS
        if (!$result= mysqli_query($connect, $queryUnidad)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id'][$i] = $row['unidad_id'];
                $response ['nombre'][$i] = $row['nombre_unidad'];
            $i++;
            }
            $connect->close(); 
        }

        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        echo json_encode($response);
    }

    if(isset($_POST) && $funcionPOST == "consultaProveedor"){

        $queryProv = "SELECT proveedor_id, nombre_proveedor FROM proveedores";

        //Resultados de consulta PERMISOS
        if (!$result= mysqli_query($connect, $queryProv)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id'][$i] = $row['proveedor_id'];
                $response ['nombre'][$i] = $row['nombre_proveedor'];
                $i++;
            }
            $connect->close(); 
        }

        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        echo json_encode($response);
    }

    if(isset($_POST) && $funcionPOST == "consultaMateriales_item"){

        $queryMat_item = "SELECT producto_materiales_id, nombre_material FROM productos_materiales INNER JOIN productos ON productos_materiales.id_producto = productos.producto_id INNER JOIN materiales ON productos_materiales.id_material = materiales.material_id WHERE id_producto = '$id' ";

        //Resultados de consulta materiales_item
        if (!$result= mysqli_query($connect, $queryMat_item)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id'][$i] = $row['producto_materiales_id'];
                $response ['nombre'][$i] = $row['nombre_material'];
                $i++;
            }
            $connect->close(); 
        }

        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        echo json_encode($response);
    }

    if(isset($_POST) && $funcionPOST == "consultaMateriales"){

        $queryMat = "SELECT material_id, nombre_material, descripcion_material FROM materiales";

        //Resultados de consulta materiales 
        if (!$result= mysqli_query($connect, $queryMat)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id'][$i] = $row['material_id'];
                $response ['nombre'][$i] = $row['nombre_material'];
                $response ['descripcion'][$i] = $row['descripcion_material'];
                $i++;
            }
            $connect->close(); 
        }

        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        echo json_encode($response);
    }

    if(isset($_POST) && $funcionPOST == "queryDouble_materials"){

        $response = [];
        $response ['id'] = $id;

        $queryMat_item = "SELECT producto_materiales_id, id_material, nombre_material FROM productos_materiales INNER JOIN productos ON productos_materiales.id_producto = productos.producto_id INNER JOIN materiales ON productos_materiales.id_material = materiales.material_id WHERE id_producto = '$id' ";

        $queryMat = "SELECT material_id, nombre_material, descripcion_material FROM materiales";

        //Resultados de consulta materiales 
        if (!$result_mat= mysqli_query($connect, $queryMat)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result_mat) > 0) {
            $i = 0;
            while ($row_mat = mysqli_fetch_assoc($result_mat)) {
                $response ['id_mat'][$i] = $row_mat['material_id'];
                $response ['nombre_mat'][$i] = $row_mat['nombre_material'];
                $response ['descripcion_mat'][$i] = $row_mat['descripcion_material'];
                $i++;
            }
        }

        else
        {
            $response['status_material'] = 200;
            $response['message_material'] = "Data not found!";
        }
        
    
        //Resultados de consulta materiales_item
        if (!$result= mysqli_query($connect, $queryMat_item)) {
            exit(mysqli_error($connect));
        }
        if(mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response ['id_pr_mt'][$i] = $row['id_material'];
                $response ['producto_materiales_id'][$i] = $row['producto_materiales_id'];
                $response ['nombre_pr_mt'][$i] = $row['nombre_material'];
            $i++;
            }
        }
    
        else{
            $response['status_item'] = 200;
            $response['message_item'] = "Data not found!";
        }
    
    echo json_encode($response);
    mysqli_close($connect);
    
    }
?>