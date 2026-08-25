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
}

