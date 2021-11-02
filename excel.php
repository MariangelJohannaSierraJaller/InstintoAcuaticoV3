<?php

include "conexion.php";
$table=$_GET['table'];
$data=date(' Y-m-d H-i-s');
$name=$table.$data;
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ".$name.".xls");

?>
<table class="content-table">
    <thead>
        <tr>
            <?php
            $records = $con->prepare('EXPLAIN usuarios');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                    <td><?php echo $results['Field']; ?></td>
            <?php } ?>
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