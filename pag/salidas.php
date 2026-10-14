<?php

require '../db/funciones.php';

$salida = obtener_salidas();

if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 3) {

        echo "<script>alert('Salida eliminada correctamente');</script>";
    } else {

        echo "<script>alert('No se pudo eliminar la salida');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'salidas.php');</script>";
}

?>

<body>
    <table>
        <div>
            <a href="../form/formSalidas.php">Crear Salida</a>
        </div>

        <div>
            <a href="dashboard.php">Volver Atras</a>
        </div> 

        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Destino</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($salidas = mysqli_fetch_assoc($salida)) {
            ?>
                <tr>
                    <td><?php echo $salidas['idSalida'] ?></td>
                    <td><?php echo $salidas['fecha'] ?></td>
                    <td><?php echo $salidas['hora'] ?></td>
                    <td><?php echo $salidas['destino'] ?></td>
                    <td><a href="../includes/salidas/update.php">Actualizar</a></td>
                    <td><a href="../includes/salidas/delete.php?idSalida=<?php echo $salidas['idSalida']; ?>"
                                onclick="return confirm('¿Seguro que quieres eliminar a <?php echo htmlspecialchars($salidas['idSalida'] . ' ' . $salidas['fecha'], ENT_QUOTES); ?>? Esta acción no se puede deshacer.');">Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <table>
</body>