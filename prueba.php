<?php 
 $opciones = array(
    'cost' => 12
);

$password_hashed = password_hash('123456', PASSWORD_BCRYPT, $opciones);

echo $password_hashed;