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
            while ($head = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                    <td><?php echo $head['Field']; ?></td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM usuarios');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <?php
                $records = $con->prepare('EXPLAIN usuarios');
                $records->execute();
                while ($head = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                        <td><?php echo $results[string($head['Field'])]; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    <tbody>
    </table>