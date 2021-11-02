<?php
require 'Seguridad.php';
require 'conexion.php'

?>
<?php if (!empty($user)) : ?>
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
    <link href="assets/css/styleTables.css" rel="stylesheet">
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php if ($user['type'] == 0) : ?>
      <?php include("assets/head/MainHeader0.html") ?>
    <?php endif; ?>
    <?php if ($user['type'] == 1) : ?>
      <?php include("assets/head/MainHeader1.html") ?>
    <?php endif; ?>
    <!-- End Header -->
    
    <?php if (!empty($user) && $user['type'] == 1) : ?>
      <h1> <?php echo $user['email']; ?></h1>
    <?php endif; ?>
    <h4>
      <center>Datos de Usuarios</center>
    </h4>
    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Correo</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Tipo de Usuario</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM usuarios WHERE type = 0');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['email']; ?></td>
            <td><?php echo $results['name']; ?></td>
            <td><?php echo $results['lastname']; ?></td>
            <td><?php echo $results['phone']; ?></td>
            <td><?php echo $results['direction']; ?></td>
            <td><?php echo $results['type']; ?></td>
            <td>
              <a href='modificarAdmin.php?id=<?php echo $results['id']; ?>'><button type='button' class="btn btn-success">Modificar</a>
              <a href="eliminarAdmin.php?id=<?php echo $results['id']; ?>"><button type='button' class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
        <?php } ?>
      <tbody>
    </table>
    <table class="content-table">
      <a href="xls.php?table=usuarios"><button type='button' class="btn btn-success">xls</a>
      <a href="csv.php?table=usuarios"><button type='button' class="btn btn-success">csv</a>
      <a href="txt.php?table=usuarios"><button type='button' class="btn btn-success">txt</a>
    </table>

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