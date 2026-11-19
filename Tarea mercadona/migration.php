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
    echo ('Conexión correcta.<br>');

    $sql = "CREATE TABLE IF NOT EXISTS mercadona (
        id BIGINT unsigned AUTO_INCREMENT PRIMARY KEY,
        direccion VARCHAR(150) NOT NULL,
        localidad VARCHAR(100) NOT NULL,
        fecha_apertura DATE NOT NULL,
        encargado VARCHAR(150) UNIQUE NOT NULL,
        telefono VARCHAR(12) NULL,
        ingreso_anual DECIMAL(10,3) DEFAULT 0,
        CONSTRAINT uq_direccion_localidad UNIQUE (direccion, localidad)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Ejecutar la sentencia en el servidor
    $pdo->exec($sql);
    
    echo "Conexión exitosa. La tabla 'mercadona' se ha verificado o creado correctamente.";

}catch(\Throwable $error){
    echo ('Se ha producido un error, aquí más información: ');
    echo ('<pre>' . var_export($error, true) . '</pre>');
    echo ($error->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migration</title>
</head>
<body>
    
</body>
</html>