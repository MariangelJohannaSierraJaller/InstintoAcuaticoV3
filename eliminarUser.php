<?php
 require 'Seguridad.php';
 require 'conexion.php';


 if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM usuarios WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if(!empty($_GET['id']) && !empty($user) && $user['id']==$results['id']){
  $records = $con->prepare('DELETE FROM usuarios WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  header('Location: cerrar.php');
}