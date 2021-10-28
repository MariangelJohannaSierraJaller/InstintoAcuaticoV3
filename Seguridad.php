<?php
  session_start();

  require 'conexion.php';

  if (isset($_SESSION['autentificado'])) {
    $record = $con->prepare('SELECT id, email, name, lastname, phone, direction, password, type FROM usuarios WHERE id = :id');
    $record->bindParam(':id', $_SESSION['autentificado']);
    $record->execute();
    $result = $record->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($result) > 0) {
      $user = $result;
    }
  }
?>
