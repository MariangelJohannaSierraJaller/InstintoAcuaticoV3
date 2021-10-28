<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
$class = '';

if (!empty($_POST['email'])) {
  $sql = "INSERT INTO registros (Service_Name, AR_Date, email) VALUES (:curso, :fechar, :email)";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':curso', $_POST['curso']);
  $fecha = date('Y-m-d');
  $stmt->bindParam(':fechar', $fecha);
  $stmt->bindParam(':email', $_POST['email']);
  if ($stmt->execute()) {
    $message = 'Tu Registro ha sido creada con éxito.';
    $class = "text-true";
  } else {
    $message = 'Tu Registro no se pudo crear.';
    $class = "text-false";
  }
}
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Sign Up </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Template Main CSS File -->
    <link href="assets/css/styleLogin.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bocor - v2.2.1
  * Template URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <?php if (!empty($message)) : ?>
      <div class="<?php echo $class; ?>">
        <p>
          <center><?= $message ?></center>
        </p>
      </div>
      <br></br>
    <?php endif; ?>
    <nav class="main">
      <a href="index.php"><img src="assets/img/swirl.png"></a>
    </nav>
    <div class="formulario">
      <h1>Solicitud De Servicios</h1>
      <form action="menu_ss.php" method="post">
        <input type="hidden" name="email" value="<?php echo $user['email'] ?> ">
        <select name="curso" required>
          <option value="">Seleccione</option>
          <option value="Parvulos">Parvulos </option>
          <option value="Predeportivos">Predeportivos</option>
          <option value="Escolares">Escolares</option>
          <option value="Adultos ">Adultos </option>
        </select>
        <button type="submit" class="btn btn-success">Guardar</button>
      </form>
    </div>
  </body>

  </html>
<?php else : ?>
  <!DOCTYPE html>
  <!--html cuando no se inicio sesion-->
  <html>

  <body>
    <script>
      setTimeout(alertFunc, 1000);

      function alertFunc() {
        location.replace("index.php")
      }
    </script>
  </body>

  </html>

<?php endif; ?>