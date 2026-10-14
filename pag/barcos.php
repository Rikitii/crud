<?php

require '../db/funciones.php';

$barco = obtener_barco();

if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 3) {

        echo "<script>alert('Barco eliminado correctamente');</script>";
    } else {

        echo "<script>alert('No se pudo eliminar el barco');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'barcos.php');</script>";
}


?>

<body>
    <table>
        <div>
            <a href="../form/formBarcos.php">Crear Barco</a>
        </div>

        <div>
            <a href="dashboard.php">Volver Atras</a>
        </div>

        <thead>
            <tr>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Numero de Amarre</th>
                <th>Cuota de amarre</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($barcos = mysqli_fetch_assoc($barco)) {
            ?>
                <tr>
                    <td><?php echo $barcos['matricula'] ?></td>
                    <td><?php echo $barcos['nombre'] ?></td>
                    <td><?php echo $barcos['n_amarre'] ?></td>
                    <td><?php echo $barcos['cuota_amarre'] ?></td>
                    <td><a href="../includes/barcos/update.php">Actualizar</a></td>
                    <td><a href="../includes/barcos/delete.php?matricula=<?php echo $barcos['matricula']; ?>"
                                onclick="return confirm('¿Seguro que quieres eliminar a <?php echo htmlspecialchars($barcos['matricula'] . ' ' . $barcos['nombre'], ENT_QUOTES); ?>? Esta acción no se puede deshacer.');">Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <table>
</body>