<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>
<body>
    <form action="store.php" method="post">
        <label for="direccion">Dirección:</label><br>
        <input type="text" name="direccion" id="direccion" value="" placeholder="Dirección..." minlength="2" maxlength="150" size="25px" required><br><br>
        <label for="localidad">Localidad:</label><br>
        <input type="text" name="localidad" id="localidad" value="" placeholder="Localidad..." minlength="2" maxlength="100" size="25px" required><br><br>
        <label for="fecha_apertura">Fecha de apertura:</label><br>
        <input type="date" name="fecha_apertura" id="fecha_apertura" value="" style="width:212px"><br><br>
        <label for="encargado">Encargado:</label><br>
        <input type="text" name="encargado" id="encargado" value="" placeholder="Encargado..." minlength="2" maxlength="150" size="25px"><br><br>
        <label for="telefono">Teléfono:</label><br>
        <input type="text" name="telefono" id="telefono" value="" placeholder="Teléfono..." minlength="9" maxlength="9" size="23px"><br><br>
        <label for="ingreso_anual">Ingreso anual:</label><br>
        <input type="number" name="ingreso_anual" id="ingreso_anual" value="" placeholder="Ingreso..." min="0.00" step="0.01" size="23px"><br><br>
        <button type="submit" value="">Crear</button>
    </form>
    <p><a href="./index.php">Lista mercadonas</a></p>
</body>
</html>