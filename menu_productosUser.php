<?php
require 'Seguridad.php';
require 'conexion.php'
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>

  <?php include("assets/default/head.html")?>
<?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/tabla.css" rel="stylesheet">
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?><!-- End Header -->

     <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Registro de Solicitudes</h1>
          <center><h2><?php echo $user['name']; ?>, estas son las solicitudes de producto que hiciste.</h2><center>
            <center><img src="assets/img/product.png" width="100px"></center>
        </div>
      </div>
 
  </section><!-- End Hero -->
  <section id="productos">
    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Servicio</th>
          <th>Fecha de Registro</th>
          <th>Fecha de Entrega</th>
          <th>Hora de entrega</th>
          <th>Correo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare( "select * from productos where email='".$user["email"]."'");
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['servicio']; ?></td>
            <td><?php echo $results['fecha']; ?></td>
            <td><?php echo $results['fechaentrega']; ?></td>
            <td><?php echo $results['horaentrega']; ?></td>
            <td><?php echo $results['email']; ?></td>
            <td>
              <!--a href='modificar_sproductosAdmin.php?id=<?php echo $results['id']; ?>'><button type='button' class="button4">Modificar</a-->
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>


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