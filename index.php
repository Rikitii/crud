<?php
    session_start();
    USE Dom\Mysql;
    require "db/funciones.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = iniciar_seccion();
        if (!$errores) {
            header('Location: form/FormUsuarios.php');
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

                <div class="campos">
                    <input type="password" name="contraseña" placeholder="Contraseña">
                </div>
            </div>
        <div>
            <input class="" type="submit" value="enviar" />
        </div>
    </fieldset>
    </div>
</form>
</table>
</body>
</html>