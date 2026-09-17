<?php

$hostname="localhost";
$username="root";
$password="1234";
$database="crud";

$conex = mysqli_connect($hostname,$username,$password,$database);

// echo "<pre>";
// var_dump ($conex);
// echo "</pre>";

// if ($conex) {
//     echo "Conexion exitosa";
// }

if (!$conex) {
    echo "Hubo un error";
    exit;
}