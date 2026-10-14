<?php

function delete_user() {
    require '../../db/conexion.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM crud WHERE id = '$id'";

    $resultado = mysqli_query($conex, $query);
    return $resultado;
}

// $message = $resultado ? 1 : 2;

// header("location: ../pag/users.php?mensaje=message");
// exit;