<?php

require '../db/funciones.php';

$socio = obtener_socios();

if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 3) {

        echo "<script>alert('Socio eliminado correctamente');</script>";
    } else {

        echo "<script>alert('No se pudo eliminar el socio');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'socios.php');</script>";
}

?>

<body>

    <body>
        <table>
            <div>
                <a href="../form/formSocios.php">Crear usuario</a>
            </div>

            <div>
                <a href="dashboard.php">Volver Atras</a>
            </div>

            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($socios = mysqli_fetch_assoc($socio)) {
                ?>
                    <tr>
                        <td><?php echo $socios['cedula'] ?></td>
                        <td><?php echo $socios['nombres'] ?></td>
                        <td><?php echo $socios['apellidos'] ?></td>
                        <td><?php echo $socios['direccion'] ?></td>
                        <td><?php echo $socios['telefono'] ?></td>
                        <td><a href="../includes/socio/update.php?cedula=<?php echo $socios['cedula']; ?>">Actualizar</a></td>
                        <td><a href="../includes/socio/delete.php?cedula=<?php echo $socios['cedula']; ?>"
                                onclick="return confirm('¿Seguro que quieres eliminar a <?php echo htmlspecialchars($socios['nombres'] . ' ' . $socios['apellidos'], ENT_QUOTES); ?>? Esta acción no se puede deshacer.');">Eliminar</a></td>
                    </tr>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <table>
    </body>
</body>