<?php

require '../db/conexion.php';

function iniciar_seccion() {

    $errores = [];
    $cedula = $_POST['cedula'];
    $contraseña = $_POST['contraseña'];

    if (!$cedula) {
        $errores[] = "Ingrese el numero de cedula";
    } if (!$contraseña) {
        $errores[] = "Ingrese una contraseña";
    }

    if (!$errores) {
        // require 'conexion.php';

        $query = "SELECT * FROM crud WHERE cedula = '$cedula'";
        $resultado = mysqli_query($conex, $query);

        if ($resultado->num_rows == 0) {
            $errores[] = "El usuario no existe";
        } else {
            //si existe se guardara los datos en $usuario
            $usuario = mysqli_fetch_assoc($resultado);

            //se compara la contraseña que puso el usuario con la que está en la base de datos 
            if (!password_verify($contraseña, $usuario['contraseña'])) {
                $errores[] = "Contraseña incorrecta";
            } else {
                $_SESSION['crud'] = $crud;
            }
        }
    }
        return $errores;
}