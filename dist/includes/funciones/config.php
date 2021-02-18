<?php
  $conn = new mysqli ('localhost', 'root', '', 'persanv1');
  if($conn->connect_error){
      echo $error -> $conn->connect_error;
  }
?>