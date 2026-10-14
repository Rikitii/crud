<?php

require __DIR__ . '/../includes/salidas/create.php';

if (isset($_POST['salidas'])) {
    $errores = create_salidas();

    if ($errores) {
        foreach ($errores as $error) {
            echo "<p>" . $error . "</p>";
        }
    }
}
?>

<body>
    <form method="POST">
        <fieldset>
            <h3>Creacion salidas</h3>
            <div>
                <div>
                    <input type="date" name="fecha" placeholder="Fecha">
                </div>

                <div>
                    <input type="time" name="hora" placeholder="Hora">
                </div>

                <div>
                    <input type="text" name="destino" placeholder="Destino">
                </div>
            </div>
        </fieldset>

        <div>
            <input type="submit" name="salidas" value="Continuar">
        </div>

    </form>
</body>