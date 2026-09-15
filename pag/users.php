<?php

// require '../db/proteger.php';

require '../db/funciones.php';

if (isset($_POST['guardar'])) {
    $errores = create_user();

if ($errores) {
    foreach ($errores as $error) {
        echo "<p>" . $error . "</p>";
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
    <body>
        <table>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Contraseña</th>
                    <th>Confirmar Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        <table>
    </body>        
</body>
</html>