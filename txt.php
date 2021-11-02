<?php

include "conexion.php";
$table=$_GET['table'];
date_default_timezone_set("America/Bogota");
$data=date(' (Y-m-d) (H-i-s)');
$name=$table.$data;
header("Content-Type: application/txt");
header("Content-Disposition: attachment; filename= ".$name.".txt");

?>
<?php
    $records = $con->prepare('EXPLAIN '.$table.'');
    $records->execute();
    $header='';
    while ($head = $records->fetch(PDO::FETCH_ASSOC)) { 
        $header=$header.$head['Field'].' ';
    } 
        echo $header;
        echo "\n";
?>
<?php
    $records = $con->prepare('SELECT * FROM '.$table.'');
    $records->execute();
    while ($results = $records->fetch(PDO::FETCH_ASSOC)) { 
        $data = $con->prepare('EXPLAIN '.$table.'');
        $data->execute();
        $dates='';
        while ($head = $data->fetch(PDO::FETCH_ASSOC)) { 
            $dates=$dates.$results[''.$head['Field'].''].' ';
        } 
            echo $dates;
            echo "\n";
    } 
?>