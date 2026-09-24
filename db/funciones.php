<?php

require 'conexion.php';


function obtener_user()
{
    try {
        //1.importar conexion
        require "conexion.php";

        //2.consultar db
        $sql = "SELECT * FROM crud;";

        //3.ejecutar la consulta con msqli
        $query = mysqli_query($conex, $sql);

        //4.acceder a los resultados
        // echo "<pre>";
        //var_dump(mysqli_fetch_assoc($query));
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


