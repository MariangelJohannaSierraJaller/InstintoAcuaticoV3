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
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->
    
     <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Administración de Implementos</h1>
          <center><h2><?php echo $user['name']; ?>, estos son los implementos que se ofrecen.</h2><center>
        </div>
      </div>
 
  </section><!-- End Hero -->
    

    <?php if (!empty($user) && $user['type'] == 1) : ?>
    <?php endif; ?>
    <section id="productos">
   
    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Implemento</th>
          <th>Descripcion</th>
          <th>Ruta</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM vitrina');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['implemento']; ?></td>
            <td><?php echo $results['descripcion']; ?></td>
            <td><?php echo $results['url']; ?></td>
            <td><img src="<?php echo $results['url']; ?>" alt="<?php echo $results['implemento']; ?>" style="width: 20%;"></td>
            <td>
              <a href='modificar_vitrina.php?id=<?php echo $results['id']; ?>'><button type='button' class="button4">Modificar</a>
              <a href="eliminar_implemento.php?id=<?php echo $results['id']; ?>"><button type='button' class="button2">Eliminar</a>
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
