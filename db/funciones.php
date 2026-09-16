<?php

require 'conexion.php';

function obtener_user() {
    try {
        //1.importar conexion
        require "conexion.php";

        //2.consultar db
        $sql = "SELECT*FROM crud";

        //3.ejecutar la consulta con msqli
        $query=mysqli_query($conex, $sql);

        //4.acceder a los resultados
        // echo "<pre>";
        // var_dump(mysqli_fetch_assoc($query));
        // echo "</pre>";

        //5.cierre de conexion(opcional)
        // $cierre = mysqli_close($conex);
        // var_dump($cierre);

        return $query;
    } catch (\Throwable $th) {
        var_dump($th);
    }

    // obtener_user();

    //function creacion_user() {
        //try{
            //1. Importar la conexion a la DB
            //require 'conexion.php';

            //2. Consultar la DB
            //$sql = "INSERT INTO $autor (nombre,apellido) VALUES (?,?)";

            //3.  Ejecutar la consulta con MYSQLI
            //$query = mysqli_query($conex,$sql);

            //4. Acceder a los resultado
            // var_dump(mysqli_fetch_assoc($query2));

            //5. Cierre de conexion
            // $cierre = mysqli_close($conex);
            // var_dump($cierre);

        //return $query;
    //     }catch(\throwable $th) {
    //         var_dump($th);
    //     }
        
    // }
}

function create_user(){
    require 'conexion.php';
    $errores = [];
    $cedula = "";
    $name = "";
    $s_nombre = "";
    $contraseña = "";
    $telefono = "";

    if (isset($_POST['agregar'])) {
    $cedula = mysqli_real_escape_string($conex,$_POST['cedula']);
    $nombre = mysqli_real_escape_string($conex,$_POST['nombre']);
    $s_nombre = mysqli_real_escape_string($conex,$_POST['s_nombre']);
    $email = mysqli_real_escape_string($conex, filter_var($_POST['email']));
    $contraseña = mysqli_real_escape_string($conex,$_POST['contraseña']);
    $c_contraseña = mysqli_real_escape_string($conex,$_POST['c_contraseña']);
    $telefono = mysqli_real_escape_string($conex,$_POST['telefono']);
    }

    if (!$cedula) {
        $errores[] = "Ingrese el numero de cedula";
    }if (!ctype_digit($cedula)) {
        $errores[] = "El documento debe contener numeros";
    }if (strlen(!$cedula) < 7 && strlen($cedula) >10) {
        $errores[] = "El documento debe tener entre 7 y 10 digitos";
    }if (!$name) {
        $errores[] = "Ingrese un nombre de usuario";
    }if (!ctype_alpha(str_replace(' ', '', $nombre))) {
        $errores[] = "El nombre solo debe contener letras";
    }if (!$s_nombre) {
        $errores[] = "Ingrese un apellido";
    }if (!ctype_alpha(str_replace(' ', '', $s_nombre))) {
        $errores[] = "El segundo nombre solo debe contener letras";
    }if (!$email) {
        $erorres[] = "Ingrese un email";
    }if (!$contraseña) {
        $erorres[] = "Ingrese una contraseña";
    } else {
        if ($contraseña != $c_contraseña) {
            $errores[] = "Las contraseñas no coinciden";
        } else {
            $contraseña = password_hash($contraseña, PASSWORD_BCRYPT);
        }

    } if (!$telefono) {
        $errores[] = "Ingrese un telefono";
    } if (strlen($telefono) != 10) {
            $erorres[] = "El numero de telefono debe tener 10 digitos";
    } if (!ctype_digit($telefono)) {
        $errores[] = "El numero de telefono solo debe contener digitos";
    }

    $query = "SELECT * FROM crud WHERE cedula = '" . $cedula . "';";
    $resultado = mysqli_query($conex, $query);

    if (!$errores) {
    $query = "INSERT INTO crud (nombre,s_nombre,cedula,email,contraseña,telefono) VALUES ('" . $nombre . "', '" . $s_nombre . "', '" . $cedula . "', '" . $email . "', '" . $contraseña . "', '" . $telefono . "')";
    $resultado = mysqli_query($conex, $query);

    if ($resultado) {
        echo "Usuario agregado con éxito";
    } else {
        echo "Error al agregar usuario";
    }
    }
    return $errores;
}

function iniciar_seccion() {

    require 'conexion.php';

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
    function  procesar_usuario(){
    $nombre = $_POST['nombre'];

    create_user($nombre);

    header('Location: index.php');
    exit;
}



    


