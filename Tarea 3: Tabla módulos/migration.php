<?php

$host     = 'mysql';
$db       = 'siga';
$user     = 'usuario';
$password = 'usuario';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try{
    $pdo = new PDO($dsn, $user, $password, $options);
    echo ('Conexión correcta.<br>');

    $sql = "CREATE TABLE IF NOT EXISTS modulos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL unique,
            abreviatura VARCHAR(5) NOT NULL unique,
            creditos decimal(4,2) NOT NULL,
            horas_semanales smallint
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Ejecutar la sentencia en el servidor
    $pdo->exec($sql);
    
    echo "Conexión exitosa. La tabla 'modulos' se ha verificado o creado correctamente.";

}catch(\Throwable $error){
    echo ('Se ha producido un error, aquí más información: ');
    echo ('<pre>' . var_export($error, true) . '</pre>');
    echo ($error->getMessage());
}
