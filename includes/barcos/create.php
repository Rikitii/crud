<?php

function create_barco()
{
    require '../../crud/db/conexion.php';

    $errores = [];
    $matricula = "";
    $nombre = "";
    $n_amarre = "";
    $cuota_amarre = "";

    if (isset($_POST['barco'])) {
        $matricula = mysqli_real_escape_string($conex, $_POST['matricula']);
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $n_amarre = mysqli_real_escape_string($conex, $_POST['n_amarre']);
        $cuota_amarre = mysqli_real_escape_string($conex, $_POST['cuota_amarre']);

        if (!$matricula) {
            $errores[] = "Ingrese un numero de matricula";
        }

        if (!$nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$n_amarre) {
            $errores[] = "Ingrese un numero de amarre";
        }

        if (!$cuota_amarre) {
            $errores[] = "Ingrese una cuota de amarre";
        }

        $query = "SELECT * FROM barco WHERE matricula = '$matricula';";
        $resultado = mysqli_query($conex, $query);

        if ($resultado->num_rows) {
            $errores[] = "Barco ya existente";
        }

        if (!$errores) {
            $query = "INSERT INTO barco (matricula,nombre,n_amarre,cuota_amarre) VALUES ('$matricula','$nombre','$n_amarre','$cuota_amarre')";
            $resultado = mysqli_query($conex, $query);

            if ($resultado) {
                echo "Barco agregado con exito";
                header("location: ../../crud/pag/barcos.php");
            } else {
                echo "Error al agregar el Barco";
            }
        } else {
            return $errores;
        }
    }
}
