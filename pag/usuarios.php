<?php

require '../db/funciones.php';

$usuario = obtener_user();

if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 3) {

        echo "<script>alert('Usuario eliminado correctamente');</script>";
    } else {

        echo "<script>alert('No se pudo eliminar el usuario');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'usuarios.php');</script>";
}

?>

<body>

    <body>
        <table>
            <div>
                <a href="../form/formUsuarios.php">Crear usuario</a>
            </div>

            <div>
                <a href="dashboard.php">Volver Atras</a>
            </div>

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>S. Nombre</th>
                    <th>Cedula</th>
                    <th>Email</th>
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
                        <td><?php echo $user['telefono'] ?></td>
                        <td><a href="../includes/users/update.php?id=<?php echo $user['id']; ?>">Actualizar</a></td>
                        <td><a href="../includes/usuarios/delete.php?id=<?php echo $user['id']; ?>"
                                onclick="return confirm('¿Seguro que quieres eliminar a <?php echo htmlspecialchars($user['nombre'] . ' ' . $user['s_nombre'], ENT_QUOTES); ?>? Esta acción no se puede deshacer.');">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <table>
    </body>
</body>