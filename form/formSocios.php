<?php

require __DIR__ . '/../includes/socio/create.php';

if (isset($_POST['socios'])) {
    $errores = create_socio();
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
            <h3>Creacion Socio</h3>
            <div>
                <div>
                    <input type="text" name="nombres" placeholder="Nombres">
                </div>

                <div>
                    <input type="text" name="apellidos" placeholder="Apellidos">
                </div>

                <div>
                    <input type="number" name="cedula" placeholder="Documento">
                </div>

                <div>
                    <input type="number" name="telefono" placeholder="Telefono">
                </div>

                <div>
                    <input type="string" name="direccion" placeholder="Direccion">
                </div>
            </div>

            <div>
                <input type="submit" name="socios" value="Continuar">
            </div>

        </fieldset>

        <div>
            <a href="../pag/socios.php">Volver atras</a>
        </div>
    </form>
</body>