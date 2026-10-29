<?php

//a esta página se llega con POST

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

    if(!isset($_POST["nombre"]) || !isset($_POST["abreviatura"]) || !isset($_POST["creditos"]) || !isset($_POST["horas"])){
        header("Location: error.php");
        exit;
    }

    $nombre = $_POST["nombre"];
    $abreviatura = $_POST["abreviatura"];
    $creditos = $_POST["creditos"];
    $horas = $_POST["horas"];

    if($nombre == ""){
        $nombre = NULL;
    }
    if($abreviatura == ""){
        $abreviatura = NULL;
    }
    if($creditos == ""){
        $creditos = NULL;
    }

    $sql = "INSERT INTO modulos (nombre, abreviatura, creditos, horas_semanales) VALUES (
        :nombre,
        :abreviatura,
        :creditos,
        :horas 
    )";

    $preparada = $pdo->prepare($sql);
    $datos = [
        "nombre" => $nombre,
        "abreviatura" => $abreviatura,
        "creditos" => $creditos,
        "horas" => $horas
    ];

    $preparada->execute($datos);

    header("Location: exito.php");
} catch(\Throwable $error){
    header("Location: error.php");
}