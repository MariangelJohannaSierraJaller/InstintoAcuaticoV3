<?php

include "conexion.php";
header("Content-Type: application/xlsx");
header("Content-Disposition: attachment; filename= archivo.xlsx");

?>
<table class="content-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Tipo de Usuario</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $records = $con->prepare('SELECT * FROM usuarios WHERE type = 0');
    $records->execute();
    while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['email']; ?></td>
            <td><?php echo $results['name']; ?></td>
            <td><?php echo $results['lastname']; ?></td>
            <td><?php echo $results['phone']; ?></td>
            <td><?php echo $results['direction']; ?></td>
            <td><?php echo $results['type']; ?></td>
        </tr>
    <?php } ?>
    <tbody>
    </table>