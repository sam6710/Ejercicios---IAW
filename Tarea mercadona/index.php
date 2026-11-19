<?php

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

    $sql = "SELECT * FROM mercadona";

    $preparada = $pdo->prepare($sql);
    $preparada->execute();
}catch(\Throwable $error){
    echo ('Se ha producido un error, aquí más información: ');
    echo ($error->getMessage());
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mercadonas</title>
</head>
<body>
    <h1>Lista de Mercadonas</h1>
    <h2><a href="./create.php">Crear mercadona</a></h2>
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
                <?php
                    while($fila = $preparada->fetch()) {   
                ?>
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
                        <a href="./edit.php?id=<?=$fila["id"]?>">Editar</a>
                        <a href="./delete.php?id=<?=$fila["id"]?>">Borrar</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </tbody>
    </table>
</body>
</html>

<?php