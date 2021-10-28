<?php
require 'Seguridad.php';
require 'conexion.php';

if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM usuarios WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_GET['email']) && !empty($_GET['name']) && !empty($_GET['lastname']) && !empty($_GET['phone']) && !empty($_GET['direction'])) {
  $sql = "UPDATE usuarios SET email=:email, name=:name, lastname=:lastname, phone=:phone, direction=:direction, type=:type WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':email', $_GET['email']);
  $stmt->bindParam(':name', $_GET['name']);
  $stmt->bindParam(':lastname', $_GET['lastname']);
  $stmt->bindParam(':phone', $_GET['phone']);
  $stmt->bindParam(':direction', $_GET['direction']);
  $stmt->bindParam(':type', $_GET['type']);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
  header('Location:  menu_ppalAdmin.php');
}

?>
<?php if (!empty($user) && $results['type'] == 1) : ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Instinto Acuático</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/styleLogin.css" rel="stylesheet">
  </head>

  <body>
    <?php if (!empty($user)) : ?>
      <h1> <?php echo $user['email']; ?></h1>
    <?php endif; ?>
    <h4>
      <center>Modificar Datos</center>
    </h4>
    <div class="formulario">
      <?php if (!empty($_GET['id'])) : ?>
        <form action="modificarAdmin.php" method="get">

          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?> ">
          <label>Correo: </label>
          <input type="email" name="email" value="<?php echo $results['email'] ?>"><br>

          <label>Nombre: </label>
          <input type="text" name="name" value="<?php echo $results['name'] ?>"><br>

          <label>Apellidos: </label>
          <input type="text" name="lastname" value="<?php echo $results['lastname'] ?>"><br>

          <label>Telefono: </label>
          <input type="text" name="phone" value="<?php echo $results['phone'] ?>"><br>

          <label>Dirrecion: </label>
          <input type="text" name="direction" value="<?php echo $results['direction'] ?>"><br>

          <label>Tipo de Usuario: </label>
          <input type="text" name="type" value="<?php echo $results['type'] ?>"><br>
        <?php endif; ?>
        <br>
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
