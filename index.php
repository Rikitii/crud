<?php
    USE Dom\Mysql;
    require "db/funciones.php";
    $autor = obtener_user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Conexion a mysqli</h1>
    <table>
        <thead>
            <tr>
                <td>Nombres</td>
                <td>Apellidos</td>
            </tr>
            <tr>
                <?php while($autores = mysqli_fetch_assoc($autor)){ ?>
            </tr>
    <tr>
        <td><?php echo $autores['nombre'] ?></td>
        <td><?php echo $autores['apellido'] ?></td>
    </tr>
    <tr>
        <?php   
        }
        ?>
    </tr>
</thead>
</table>
</body>
</html>