<?php

function eliminar_salida()
{
    require '../../db/conexion.php';

    $idSalida = $_GET['idSalida'];

    $query = "DELETE FROM salidas WHERE idSalida = '$idSalida'";

    $resultado = mysqli_query($conex, $query);

    return $resultado;
}

$resultado = eliminar_salida();

$message = $resultado ? 3 : 4;

header("Location: /crud/pag/salidas.php?mensaje=$message");
exit;