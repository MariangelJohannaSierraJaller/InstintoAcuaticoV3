<?php
 require 'Seguridad.php';
 require 'conexion.php';

if (!empty($_GET['id'])) {
    $records = $con->prepare('SELECT url FROM galeria WHERE id = :id');
    $records->bindParam(':id', $_GET['id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
}
if(!empty($_GET['id']) && !empty($user) && $user['type']==1){
  $records = $con->prepare('DELETE FROM galeria WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  unlink( $results['url']);
  $records->execute();
  header('Location:  menu_PserviciosAdmin.php');
}