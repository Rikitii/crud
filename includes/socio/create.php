<?php

function create_socio() {
    require '../../crud/db/conexion.php';

    $errores = [];
    $cedula = "";
    $nombres = "";
    $apellidos = "";
    $direccion = "";
    $telefono = "";

    if (isset($_POST['socios'])) {
        $cedula = mysqli_real_escape_string($conex, $_POST['cedula']);
        $nombres = mysqli_real_escape_string($conex, $_POST['nombres']);
        $apellidos = mysqli_real_escape_string($conex, $_POST['apellidos']);
        $direccion = mysqli_real_escape_string($conex, $_POST['direccion']);
        $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);

        if (!$cedula) {
            $errores[] = "Digite una fecha de salida";
        }

        if (!$nombres) {
            $errores[] = "Ingrese sus nombres";
        }

        if (!$apellidos) {
            $errores[] = "Ingrese sus apellidos";
        }

        if (!$direccion) {
            $errores[] = "Ingrese una direccion";
        }

        if (!$telefono) {
            $errores[] = "Ingrese un numero de telefono";
        }

        $query = "SELECT * FROM socio WHERE cedula = '$cedula';";
        $resultado = mysqli_query($conex, $query);

        if ($resultado->num_rows) {
            $errores[] = "Socio ya existente";
        }

        if (!$errores) {
            $query = "INSERT INTO socio(cedula,nombres,apellidos,direccion,telefono) VALUES ('$cedula','$nombres','$apellidos','$direccion','$telefono');";
            $resultado = mysqli_query($conex, $query);

            if ($resultado) {
                echo "Socio agregada con exito";
                header("location: ../../crud/pag/socios.php");
            } else {
                echo "Error al agregar el socio";
            }
        } else {
            return $errores;
        }
    }
}