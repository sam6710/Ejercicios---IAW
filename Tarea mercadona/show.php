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
    <title>Lista de <?=$id?></title>
</head>
<body>
    <h1 style="color: red">Mercadona <?=$id?></h1>
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
                    <a href="./edit.php?id=<?=$fila["id"]?>">Editar</a> 
                    <a href="./delete.php?id=<?=$fila["id"]?>">Borrar</a>
                </td>
            </tr>
        </tbody>
    </table>
    <p><a href="./create.php">Crear mercadona</a></p>
    <p><a href="./index.php">Lista mercadonas</a></p>
</body>
</html>

<?php