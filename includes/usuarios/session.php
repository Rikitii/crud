<?php

function iniciar_seccion()
{

    require '../crud/db/conexion.php';

    $errores = [];
    $cedula = $_POST['cedula'];
    $contraseña = $_POST['contraseña'];

    if (!$cedula) {
        $errores[] = "Ingrese el numero de cedula";
    }

    if (!$contraseña) {
        $errores[] = "Ingrese una contraseña";
    }

    if (!$errores) {
        $query = "SELECT * FROM crud WHERE cedula = '$cedula';";
        $resultado = mysqli_query($conex, $query);

        $usuario = mysqli_fetch_assoc($resultado);

        if (!password_verify($contraseña, $usuario['contraseña'])) {
            $errores[] = "Credenciales no registradas";
        } else if (!$usuario) {
            $errores[] = "Credenciales no registradas";
        } else {
            session_start();
            header('Location: pag/dashboard.php');
            exit;
        }
    }
    return $errores;
}
