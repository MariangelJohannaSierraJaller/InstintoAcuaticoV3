<?php
require 'Seguridad.php';
require 'conexion.php'
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php include("assets/default/head.html")?>
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
    <header id="header">
    <?php include("assets/head/headerRegistro.html") ?>
    </header><!-- End Header -->
           
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Datos de Contacto</h1>
      <center><h2><?php echo $user['name']; ?>, estos son los usuarios que se han contactado.</h2><center>
        <center><img src="assets/img/swirl.png" width="100px"></center>
        </div>
    <?php include("assets/table/table.html") ?> 
           
      </div>
  </section><

    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Mensaje</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM contacto');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['name']; ?></td>
            <td><?php echo $results['lastname']; ?></td>
            <td><?php echo $results['email']; ?></td>
            <td><?php echo $results['phone']; ?></td>
            <td><?php echo $results['message']; ?></td>
            <td>
              <a href='modificarAdmin.php?id=<?php echo $results['id']; ?>'><button type='button' class="button4">Modificar</a>
              <a href="eliminarAdmin.php?id=<?php echo $results['id']; ?>"><button type='button' class="button2">Eliminar</a>
            </td>
          </tr>
        <?php } ?>
      <tbody>
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
  <!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->
  <?php include("assets/footer/links.html") ?>

  </body>

</html>