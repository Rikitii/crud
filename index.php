<?php
    session_start();
    //USE Dom\Mysql;
    require "db/funciones.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = iniciar_seccion();
        if (!$errores) {
            header('Location: form/formUsuarios.php');
            exit;
        }

        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion a mysqli</title>
</head>
<body>
    <h1>Conexion a mysqli</h1>
    <form  method="post">
        <fieldset>
        <h3>inicia sección </h3>
        <div>
            <div>
                <input type="string" name="cedula" placeholder="Documento">
            </div>

            <div>
                 <input type="password" name="contraseña" placeholder="Contraseña">
            </div>

        </div>
        <div>
            <input type="submit" value="enviar" />
        </div>

        <div>
            <input href="" type="submit" value="Crear Usuario" />
        </div>
    </fieldset>
    </div>
</form>
</body>
</html>