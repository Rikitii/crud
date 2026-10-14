<?php

require __DIR__ . '/../includes/usuarios/create.php';

if (isset($_POST['usuarios'])) {
    $errores = create_user();
    if ($errores) {
        foreach ($errores as $error) {
            echo "<p> " . $error . "</p>";
        }
    }
}

?>

<body>
    <form method="POST">
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
                <input type="submit" name="usuarios" value="Continuar">
            </div>

        </fieldset>

        <div>
            <a href="../pag/usuarios.php">Volver atras</a>
        </div>
    </form>
</body>