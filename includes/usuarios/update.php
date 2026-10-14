<?php

function actualizar_usuario($id, $cedula) {
    try {
        require __DIR__ . '../../db/conexion.php';
        $errores = [];
        $id = (int) $id;

        if (!$nombre) {
            $errores[] = "Ingrese un nombre";
        }
        if (!$apellido) {
            $errores[] = "Ingrese un apellido";
        }
        if (!$email) {
            $errores[] = "Ingrese un email";
        }
        if (!$telefono) {
            $errores[] = "Ingrese un numero de telefono";
        }

        $usuario_actual = mysqli_fetch_assoc(
            mysqli_query($conex, "SELECT * FROM usuario WHERE id_usuario = $id;")
        );

        $quiere_cambiar_password = $nueva_contraseña !== "" || $confirmar_contraseña !== "";

        if ($quiere_cambiar_password) {
            if (!$contraseña_actual || !$usuario_actual || !password_verify($contraseña_actual, $usuario_actual['contraseña'])) {
                $errores[] = "La contraseña actual no es correcta";
            }
            if (!$nueva_contraseña) {
                $errores[] = "Ingrese la nueva contraseña";
            }
            if ($nueva_contraseña != $confirmar_contraseña) {
                $errores[] = "La confirmacion de la nueva contraseña no coincide";
            }
        }

        if ($errores) {
            return $errores;
        }

        $nombre = mysqli_real_escape_string($conex, $nombre);
        $apellido = mysqli_real_escape_string($conex, $apellido);
        $email = mysqli_real_escape_string($conex, $email);
        $telefono = mysqli_real_escape_string($conex, $telefono);

        if ($quiere_cambiar_password) {
            $nueva_contraseña_hash = password_hash($nueva_contraseña, PASSWORD_BCRYPT);
            $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$telefono', contraseña = '$nueva_contraseña_hash' WHERE id_usuario = $id";
        } else {
            $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$telefono' WHERE id_usuario = $id";
        }

        $resultado = mysqli_query($conex, $sql);

        if ($resultado) {
            return [];
        }

        return ["Error al actualizar el usuario"];
    } catch (\Throwable $th) {
        var_dump($th);
    }
}