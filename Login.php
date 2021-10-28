<?php
require 'sesion.php';
require 'conexion.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $con->prepare('SELECT * FROM usuarios WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  if($records->execute()){
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if($_POST['email']==$results['email']){
      if (password_verify($_POST['password'], $results['password'])) {
        $_SESSION['autentificado'] = $results['id'];
        header("Location: menu_ppal.php");
      } else {
        $message = 'Sorry, the password is incorrect';
        $tipo = 'error';
      }
    }else {
      $message = 'Sorry, the username is incorrect';
      $tipo = 'error';
    }
  }else {
    $message = 'Sorry, the username or password is incorrect';
    $tipo = 'error';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Login </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Template Main CSS File -->
  <link href="assets/css/styleLogin.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- =======================================================
  * Template Name: Bocor - v2.2.1
  * Template URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php if (!empty($message)) : ?>
    <script>
      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
    </script>
  <?php endif; ?>
  <nav class="main">
    <a href="index.php"><img src="assets/img/login.png" width="180px" height="180px"></a>
  </nav>
  <div class="formulario">
    <form action="Login.php" method="post">
      <input type="email" name="email" placeholder="Ingresa tu email" required maxlength="100">
      <input type="password" name="password" placeholder="Ingresa tu contraseña" required maxlength="20">
      <p><a class="text" href="Forgot Password.php"></a></p>
      <input type="submit" value="Iniciar sesión">
    </form>
    <form action="SignUp.php" method="post">
      <input type="submit" value="Registrarse">
    </form>
  </div>
</body>

</html>
