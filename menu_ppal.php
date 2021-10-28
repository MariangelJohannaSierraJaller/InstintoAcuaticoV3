<?php
require 'Seguridad.php';
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



    <!-- ======= Hero Section ======= -->
    <section id="hero">

      <div class="container">

        <?php if (!empty($user)) : ?>
          <center>
            <h1> Te damos la bienvenida <?php echo $user['name']; ?></h1>
          </center>
          <center>
            <h2>Datos de Usuario</h2>
          </center>
          <table class="content-table">
            <thead>
              <tr>
                <th>Correo</th>
                <th>Nombre(s)</th>
                <th>Apellido(s)</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['direction']; ?></td>
                <td>
                  <a href='modificarUser.php?id=<?php echo $user['id']; ?>'><button type='button' class="btn btn-success">Modificar</a>
                  <a href="eliminarUser.php?id=<?php echo $user['id']; ?>"><button type='button' class="btn btn-danger">Eliminar</a>
                </td>
              </tr>
            <tbody>
          </table>
        <?php endif; ?>
      </div>

    </section><!-- End Hero -->
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