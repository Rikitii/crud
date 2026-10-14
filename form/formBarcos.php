<?php

require __DIR__ . '/../includes/barcos/create.php';

if (isset($_POST['barco'])) {
    // var_dump("Presiono el boton");
    // exit;
    $errores = create_barco();
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
            <h3>Creacion Barco</h3>

            <div>
                <div>
                    <input type="text" name="matricula" placeholder="Matricula">
                </div>

                <div>
                    <input type="text" name="nombre" placeholder="Nombre">
                </div>

                <div>
                    <input type="text" name="n_amarre" placeholder="Numero de Amarre">
                </div>

                <div>
                    <input type="float" name="cuota_amarre" placeholder="Cuota de amarre">
                </div>

                <div>
                    <input type="submit" name="barco" value="Continuar">
                </div>
            </div>
        </fieldset>

        <div>
            <a href="../pag/barcos.php">Volver atras</a>
        </div>

    </form>
</body>
