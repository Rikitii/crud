<?php

function eliminar_usuario()
{
    require '../../db/conexion.php';

    $id = $_GET['id'];

    $query = "DELETE FROM crud WHERE id = '$id'";

    $resultado = mysqli_query($conex, $query);

    return $resultado;
}

$resultado = eliminar_usuario();

$message = $resultado ? 3 : 4;

header("Location: /crud/pag/usuarios.php?mensaje=$message");
exit;