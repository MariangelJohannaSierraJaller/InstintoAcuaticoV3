<?php

include "conexion.php";
$table=$_GET['table'];
$data=date(' (Y-m-d) (H-i-s)');
$name=$table.$data;
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename= ".$name.".csv");

?>
<table class="content-table">
    <thead>
        <tr>
            <?php
            $records = $con->prepare('EXPLAIN '.$table.'');
            $records->execute();
            while ($head = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                    <td><?php echo $head['Field']; ?></td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM '.$table.'');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <?php
                $data = $con->prepare('EXPLAIN '.$table.'');
                $data->execute();
                while ($head = $data->fetch(PDO::FETCH_ASSOC)) { ?>
                        <td><?php echo $results[''.$head['Field'].'']; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    <tbody>
</table>