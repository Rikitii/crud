<?php

function eliminar_barco()
{
    require '../../db/conexion.php';

    $matricula = $_GET['matricula'];

    $query = "DELETE FROM barco WHERE matricula = '$matricula'";

    $resultado = mysqli_query($conex, $query);

    return $resultado;
}

$resultado = eliminar_barco();

$message = $resultado ? 3 : 4;

header("Location: /crud/pag/barcos.php?mensaje=$message");
exit;