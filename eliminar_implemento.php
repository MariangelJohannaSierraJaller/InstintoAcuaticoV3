<?php
 require 'Seguridad.php';
 require 'conexion.php';

if(!empty($_GET['id']) && !empty($user) && $user['type']==1){
  $records = $con->prepare('DELETE FROM vitrina WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  header('Location: menu_vitrinaAdmin.php');
}
