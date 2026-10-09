<?php
    $alumnos = [
        ['Atienza Bermúdez, Alejandro', 'm', '20'],
        ['Calderer Sánchez, Lucas', 'm', '23'],
        ['Cano Merino, Carlos', 'm', '21'],
        ['Chari, Abdelali', 'm', '22'],
        ['García Zarco, Francisco José', 'm', '22'],
        ['Gómez Pérez, Samuel', 'm', '26'],
        ['Iáñez Navarro, Daniel', 'm', '23'],
        ['López Lasheras, Alan', 'm', '20'],
        ['Maldonado Cabezas, Francisco', 'm', '20'],
        ['Martín Arias, Carlos', 'm', '20'],
        ['Moreno González, Alexandra', 'f', '20'],
        ['Muñoz Moreno, Elisabet', 'f', '23'],
        ['Ourhzif, Aymane', 'm', '20'],
        ['Sánchez Ortiz, Emilio David', 'm', '20'],
        ['Sánchez Rodríguez, Beatriz', 'f', '20'],
        ['Torres Gómez, Ignacio', 'm', '25'],
        ['Uréndez Jiménez, Alba', 'f', '20'],
        ['Uribe Aranda, Francisco', 'm', '28'],
        ['Velasco Clavero, Pablo', 'm', '20']
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>EjercicioEdadColor</title>
</head>
<body>
    <!-- Agregar a la información de cada alumno su edad y hacer una nueva columna, si al edad es par en azul, si es impar en verde -->
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Alumno</th>
                <th>Género</th>
                <th>Edad</th>
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
             <?php
                if($datos[2]%2 == 0){
            ?>
            <td style="background-color: blue;"><?=$datos[2]?></td>
            <?php
                };
            ?>

            <?php
                if($datos[2]%2 != 0){
            ?>
            <td style="background-color: green;"><?=$datos[2]?></td>
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