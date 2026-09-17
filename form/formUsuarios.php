<?php

require '../db/funciones.php';
// require '../';

if (isset($_POST['boton'])) {
    $errores = create_user();
    if ($errores) {
        foreach ($errores as $error) {
            echo "<p> " . $error . "</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <fieldset>
        <h3>Creacion Usuario</h3>
        <div>
            <div>
                <input type="text" name="nombre" placeholder="Nombre">
            </div>

            <div>
                <input type="text" name="s_nombre" placeholder="Segundo Nombre">
            </div>

            <div>
                <input type="number" name="cedula" placeholder="Documento">
            </div>

            <div>
                <input type="tel" name="telefono" placeholder="Telefono">
            </div>

            <div>
                <input type="string" name="email" placeholder="Correo">
            </div>

            <div>
                <input type="password" name="contraseña" placeholder="Contraseña">
            </div>

            <div>
                <input type="password" name="c_contraseña" placeholder="Confirmar contraseña">
            </div>
        </div>

    <div>
        <input type="submit" name="boton" value="Continuar">
    </div>

    </fieldset>

    <div>
        <a href="../pag/users.php">Volver atras</a>    
    </div>
</form>
</body>
</html>