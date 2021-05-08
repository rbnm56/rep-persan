<?php
    function usuario_autenticado(){
        if(!revisar_usuario()){
            header('Location:login.php');
        }

    }

    function revisar_usuario(){
        return isset($_SESSION['username']);
    }

    session_start();
    usuario_autenticado();
    
    $se_id_usuario      = isset($_SESSION["id"])?$_SESSION["id"]:"";
