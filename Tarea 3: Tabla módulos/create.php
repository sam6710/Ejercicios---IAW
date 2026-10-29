<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>
<body>
    <form action="store.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre..." minlength="2" maxlength="100" size="25px" required><br><br>
        <label for="abreviatura">Abreviatura:</label><br>
        <input type="text" name="abreviatura" id="abreviatura" value="" placeholder="Abreviatura..." minlength="1" maxlength="3" size="25px" required><br><br>
        <label for="creditos">Cŕeditos:</label><br>
        <input type="number" name="creditos" id="creditos" value="" maxlength="2" min="0" max="100" size="23px" step="0.01" required ><br><br>
        <label for="horas">Horas semanales:</label><br>
        <input type="number" name="horas" id="horas" value="" placeholder="Horas..." min="0" max="12" maxlength="3" size="23px" r><br><br>
        <button type="submit" value="">¡Enviar!</button>
    </form>
</body>
</html>