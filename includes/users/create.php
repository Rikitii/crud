<?php

function create_user()
{

    require '../../crud/db/conexion.php';

    $errores = [];
    $cedula = "";
    $nombre = "";
    $s_nombre = "";
    $email = "";
    $contraseña = "";
    $telefono = "";
    $c_contraseña = "";

    if (isset($_POST['usuarios'])) {
        $cedula = mysqli_real_escape_string($conex, $_POST['cedula']);
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $s_nombre = mysqli_real_escape_string($conex, $_POST['s_nombre']);
        $email = mysqli_real_escape_string($conex, filter_var($_POST['email']));
        $contraseña = mysqli_real_escape_string($conex, $_POST['contraseña']);
        $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
        $c_contraseña = mysqli_real_escape_string($conex, $_POST['c_contraseña']);
    }

    if (!$cedula) {
        $errores[] = "Ingrese el numero de cedula";
    }
    if (!ctype_digit($cedula)) {
        $errores[] = "El documento debe contener numeros";
    }
    if (strlen($cedula) != 10) {
        $errores[] = "El documento debe contener 10 digitos";
    }
    if (!$nombre) {
        $errores[] = "Ingrese un nombre de usuario";
    }
    if (!ctype_alpha(str_replace(' ', '', $nombre))) {
        $errores[] = "El nombre solo debe contener letras";
    }
    if (!$s_nombre) {
        $errores[] = "Ingrese un segundo nombre";
    }
    if (!ctype_alpha(str_replace(' ', '', $s_nombre))) {
        $errores[] = "El segundo nombre solo debe contener letras";
    }
    if (!$email) {
        $erorres[] = "Ingrese un email";
    }
    if (!$contraseña) {
        $errores[] = "Ingrese contraseña";
    } else {
        if ($contraseña != $c_contraseña) {
            $errores[] = "Las contraseñas no coinciden";
         } else {
            $contraseña = password_hash($contraseña, PASSWORD_BCRYPT);
        }
    }

    if (!$telefono) {
        $errores[] = "Ingrese un telefono";
    }
    if (strlen($telefono) != 10) {
        $erorres[] = "El numero de telefono debe tener 10 digitos";
    }
    if (!ctype_digit($telefono)) {
        $errores[] = "El numero de telefono solo debe contener digitos";
    }

    $query = "SELECT * FROM crud WHERE cedula = '$cedula';";
    $resultado = mysqli_query($conex, $query);

    if ($resultado->num_rows) {
        $errores[] = "Usuario ya existente";
    }

    if (!$errores) {
        $query = "INSERT INTO crud (nombre,s_nombre,cedula,email,contraseña,telefono) VALUES ('$nombre', '$s_nombre', '$cedula', '$email', '$contraseña', '$telefono');";
        $resultado = mysqli_query($conex, $query);

        if ($resultado) {
            echo "Usuario agregado con éxito";
        } else {
            echo "Error al agregar usuario";
        }
    }
    return $errores;
}