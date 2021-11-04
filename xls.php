<?php

include "conexion.php";
$table=$_GET['table'];
date_default_timezone_set("America/Bogota");
$data=date(' (Y-m-d) (H-i-s)');
$name=$table.$data;
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ".$name.".xls");

?>
<table class="content-table">
    <thead>
        <tr>
            <?php
            /*Consulta Estructura de Tabla para Obtener Encabeazados*/
            $records = $con->prepare('EXPLAIN '.$table.''); 
            $records->execute();
            while ($head = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                    <td><b><?php echo $head['Field']; ?><b></td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        /*Consulta Datos de la Tabla*/
        $records = $con->prepare('SELECT * FROM '.$table.'');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <?php
                /*Consulta Estructura de Tabla para Obtener datos segun encabezado*/
                $data = $con->prepare('EXPLAIN '.$table.'');
                $data->execute();
                while ($head = $data->fetch(PDO::FETCH_ASSOC)) { ?>
                        <td><?php echo $results[''.$head['Field'].'']; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    <tbody>
</table>