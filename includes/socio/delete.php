<?php

function eliminar_socio()
{
    require '../../db/conexion.php';

    $cedula = $_GET['cedula'];

    $query = "DELETE FROM socio WHERE cedula = '$cedula'";

    $resultado = mysqli_query($conex, $query);

    return $resultado;
}

$resultado = eliminar_socio();

$message = $resultado ? 3 : 4;

header("Location: /crud/pag/socios.php?mensaje=$message");
exit;