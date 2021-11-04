<?php
require 'Seguridad.php';
require 'conexion.php'
?>
<?php if (!empty($user) && $user['type'] == 1) : ?>
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
          <h1>Administrar Noticias</h1>
          <center><h2><?php echo $user['name']; ?>, estas son las noticias.</h2><center>
        </div>
      </div>
 
  </section><!-- End Hero -->
    <section id="noticias">
    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Título</th>
          <th>Descripción</th>
          <th>Ruta</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM noticias');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['titulo']; ?></td>
            <td><?php echo $results['descripcion']; ?></td>
            <td><?php echo $results['url']; ?></td>
            <td><img src="<?php echo $results['url']; ?>" alt="<?php echo $results['titulo']; ?>" style="width: 20%;"></td>
            <td>
              <a href='modificar_noticiasAdmin.php?id=<?php echo $results['id']; ?>'><button type='button' class="button4">Modificar</a>
              <a href="eliminar_noticia.php?id=<?php echo $results['id']; ?>"><button type='button' class="button2">Eliminar</a>
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
  <?php include("assets/footer/footer.html") ?>


    <?php include("assets/footer/links.html") ?><!-- End Footer -->

</body>

</html>