<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion a mysqli</title>
</head>
<body>
    <h1>Conexion a mysqli</h1>
    <form  method="post">
        <fieldset>
        <h3>inicia sección </h3>
        <div>
            <div>
                <input type="string" name="cedula" placeholder="Documento">
            </div>

            <div>
                <input type="string" name="nombre" placeholder="Nombre">
            </div>

            <div>
                <input type="string" name="s_nombre" placeholder="Segundo Nombre">
            </div>

            <div>
                <input type="tel" name="telefono" placeholder="Telefono">
            </div>

            <div>
                <input type="email" name="email" placeholder="Correo">
            </div>

            <div>
                 <input type="password" name="contraseña" placeholder="Contraseña">
            </div>

        </div>
        <div>
            <input type="submit" value="enviar" />
        </div>
    </fieldset>
    </div>
</form>
</body>
</html>