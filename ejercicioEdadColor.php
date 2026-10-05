<?php
    $alumnos = [
        ['Atienza Bermúdez, Alejandro', 'm'],
        ['Calderer Sánchez, Lucas', 'm'],
        ['Cano Merino, Carlos', 'm'],
        ['Chari, Abdelali', 'm'],
        ['García Zarco, Francisco José', 'm'],
        ['Gómez Pérez, Samuel', 'm'],
        ['Iáñez Navarro, Daniel', 'm'],
        ['López Lasheras, Alan', 'm'],
        ['Maldonado Cabezas, Francisco', 'm'],
        ['Martín Arias, Carlos', 'm'],
        ['Moreno González, Alexandra', 'f'],
        ['Muñoz Moreno, Elisabet', 'f'],
        ['Ourhzif, Aymane', 'm'],
        ['Sánchez Ortiz, Emilio David', 'm'],
        ['Sánchez Rodríguez, Beatriz', 'f'],
        ['Torres Gómez, Ignacio', 'm'],
        ['Uréndez Jiménez, Alba', 'f'],
        ['Uribe Aranda, Francisco', 'm'],
        ['Velasco Clavero, Pablo', 'm']
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Esternocleidomastoideo</title>
</head>
<body>
    <h1>Meta-Array</h1>
    <?php
        //Pretty var_dump
        echo ('<pre>' . var_export($alumnos, true) . '</pre>');
    ?>
    <!-- Agregar a la información de cada alumno su edad y hacer una nueva columna, si al edad es par en azul, si es impar en verde -->
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Alumno</th>
                <th>Género</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($alumnos as $i => $datos){
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$datos[0]?></td>
            <?php
                if($datos[1] == "m"){
            ?>
            <td style="background-color: green;"><?=$datos[1]?></td>
            <?php
                };
            ?>

            <?php
                if($datos[1] == "f"){
            ?>
            <td style="background-color: blue;"><?=$datos[1]?></td>
            <?php
                };
            ?>
        </tr>
        <?php
            };
        ?>
        </tbody>
    </table>
</body>
</html>