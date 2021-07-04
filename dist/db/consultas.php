<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $funcionPOST= $_POST['funcion'];

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
?>