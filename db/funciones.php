<?php

function obtener_user() {
    try {
        //1.importar conexion
        require "conexion.php";

        //2.consultar db
        $sql = "SELECT*FROM autor";
        $sql = "SELECT nombre, apellido FROM autor";

        //3.ejecutar la consulta con msqli
        $query=mysqli_query($conex, $sql);

        //4.acceder a los resultados
        // echo "<pre>";
        // var_dump(mysqli_fetch_assoc($query));
        // echo "</pre>";

        //5.cierre de conexion(opcional)
        // $cierre=mysqli_close($conex);
        // var_dump($cierre);

        return $query;
    } catch (\Throwable $th) {
        var_dump($th);
    }

    // obtener_user();

    if (isset($_POST['agregar'])) {
        $cedula = mysqli_real_escape_string($conex,$_POST['cedula']);
        $name = mysqli_real_escape_string($conex,$_POST['name']);
        $last_name = mysqli_real_escape_string($conex,$_POST['last_name']);
        $email = mysqli_real_escape_string($conex, filter_var($_POST['email']));
        $password = mysqli_real_escape_string($conex,$_POST['password']);
        $c_password = mysqli_real_escape_string($conex,$_POST['c_password']);
        $phone = mysqli_real_escape_string($conex,$_POST['phone']);

    if (!cedula) {
        $errores[] = "Ingrese el numero de cedula";
    }if (!name) {
        $errores[] = "Ingrese un nombre de usuario";
    }if (!last_name) {
        $errores[] = "Ingrese un apellido";
    }if (!email) {
        $erorres[] = "Ingrese un email";
    }if (!password) {
        $erorres[] = "Ingrese una contraseña";
    }if (!c_password) {
        $errores[] = "Ingrese la confirmacion de la contraseña";
    }if (!phone) {
        $errores[] = "Ingrese un telefono";
    }


    }
}

