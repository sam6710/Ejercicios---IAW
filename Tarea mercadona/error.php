<?php
$mensaje = "<h1>La acción NO se ha ejecutado correctamente.</h1>";
if(isset($_GET["error"])){
    $error = $_GET["error"];
    $mensajes = [
        "id" => "<h1>No se ha encontrado el id.</h1>",
        "mercadona" => "<h1>El mercadona no existe.</h1>",
        "destroy" => "<h1>No se ha podido borrar.</h1>",
        "datos" => "<h1>Insuficiencia de datos para dar de alta al mercadona.</h1>",
        "store" => "<h1>No se ha podido insertar el mercadona.</h1>",
        "update" => "<h1>No se ha podido actualizar el mercadona.</h1>"
    ];
    if(isset($mensajes[$error])){
        $mensaje = $mensajes[$error];
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <?=$mensaje?>
    <p><a href="./index.php">Lista mercadonas</a></p>
</body>
</html>