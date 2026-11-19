<?php

if(!isset($_GET["id"])){
    header("Location: error.php?error=id");
    exit;
}

$id = $_GET["id"];

$host     = 'mysql';
$db       = 'siga';
$user     = 'usuario';
$password = 'usuario';
$charset  = 'utf8mb4';

// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try{
    $pdo = new PDO($dsn, $user, $password, $options);

    $sql = "SELECT * FROM mercadona where id = :id";

    $preparada = $pdo->prepare($sql);

    $datos = [
        'id' => $id
    ];

    $preparada->execute($datos);
}catch(\Throwable $error){
    echo ('Se ha producido un error, aquí más información: ');
    echo ($error->getMessage());
    exit;
}

$fila = $preparada->fetch();
if($fila == null) { //no fila, no alumno, id inventao
    header("Location: error.php?error=alumno");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h1 style="color: red">Edición del mercadona <?=$id?></h1>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Direccion</th>
                <th>Localidad</th>
                <th>Fecha Apertura</th>
                <th>Encargado</th>
                <th>Telefono</th>
                <th>Ingreso Anual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$fila["id"]?></td>
                <td><?=$fila["direccion"]?></td>
                <td><?=$fila["localidad"]?></td>
                <td><?=$fila["fecha_apertura"]?></td>
                <td><?=$fila["encargado"]?></td>
                <td><?=$fila["telefono"]?></td>
                <td><?=$fila["ingreso_anual"]?></td>
                <td>
                    <a href="./show.php?id=<?=$fila["id"]?>">Ver</a> 
                    <a href="./delete.php?id=<?=$fila["id"]?>">Borrar</a>
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <form action="update.php" method="post">
        <h2>Formulario de edición:</h2>
        <input type="hidden" name="id" value="<?=$id?>">
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
        <button type="submit" value="">Editar</button>
    </form>
    <p><a href="./create.php">Crear mercadona</a></p>
    <p><a href="./index.php">Lista mercadonas</a></p>
</body>
</html>