<?php
$mensaje = "<h1>La acción se ha ejecutado correctamente.</h1>";
if(isset($_GET["ok"])){
    $ok = $_GET["ok"];
    $mensajes = [
        "destroy" => "<h1>Se ha borrado correctamente.</h1>",
        "store" => "<h1>Se ha insertado correctamente.</h1> <br> <p><a href='./create.php'>Volver</a></p>",
        "edit" => "<h1>Se ha editado correctamente.</h1>",
        "update" => "<h1>Se ha actualizado correctamente.</h1>"
    ];
    if(isset($mensajes[$ok])){
        $mensaje = $mensajes[$ok];
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito</title>
</head>
<body>
    <?=$mensaje?>
    <p><a href="./index.php">Lista mercadonas</a></p>
</body>
</html>