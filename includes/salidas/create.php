<?php

function create_salidas() {
    require '../../crud/db/conexion.php';

    $errores = [];
    $idSalida = "";
    $fecha = "";
    $hora = "";
    $destino = "";

    if (isset($_POST['salidas'])) {
        $fecha = mysqli_real_escape_string($conex, $_POST['fecha']);
        $hora = mysqli_real_escape_string($conex, $_POST['hora']);
        $destino = mysqli_real_escape_string($conex, $_POST['destino']);

        if (!$fecha) {
            $errores[] = "Digite una fecha de salida";
        }

        if (!$hora) {
            $errores[] = "Digite una hora de salida";
        }

        if (!$destino) {
            $errores[] = "Ingrese un destino";
        }

        $query = "SELECT * FROM salidas WHERE idSalida = '$idSalida';";
        $resultado = mysqli_query($conex, $query);

        if ($resultado->num_rows) {
            $errores[] = "Salida ya existente";
        }

        if (!$errores) {
            $query = "INSERT INTO salidas(fecha,hora,destino) VALUES ('$fecha','$hora','$destino');";
            $resultado = mysqli_query($conex, $query);

            if ($resultado) {
                echo "Salida agregada con exito";
                header("location: ../../crud/pag/salidas.php");
            } else {
                echo "Error al agregar la salida";
            }
        } else {
            return $errores;
        }
    }
}