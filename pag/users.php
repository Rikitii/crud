<?php

// require '../db/proteger.php';

require '../db/funciones.php';

// if (isset($_POST['guardar'])) {
//     $errores = create_user();

// if ($errores) {
//     foreach ($errores as $error) {
//         echo "<p>" . $error . "</p>";
//     }
// }
// }

$usuario = obtener_user();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
</head>
<body>
    <body>
        <table>
            <div>
                <a href="../form/formUsuarios.php">Crear user</a>
            </div>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>S. Nombre</th>
                    <th>Cedula</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
            <?php
            while ($user = mysqli_fetch_assoc($usuario)) {
             ?>

            <tr>
               <td><?php echo $user['nombre'] ?></td>
               <td><?php echo $user['s_nombre'] ?></td>
               <td><?php echo $user['cedula'] ?></td>
               <td><?php echo $user['email'] ?></td>
               <td><?php echo $user['contraseña'] ?></td>
               <td><?php echo $user['telefono'] ?></td>
               <td><a href="../includes/users/update.php?id=<?php echo $user['id']; ?>">Actualizar</a></td>
               <td><a href="../includes/users/delete.php?id=<?php echo $user['id']; ?>">Eliminar</a></td> 
            </tr>
            <?php
            }
            ?>
            </tbody>
        <table>
    </body>        
</body>
</html>