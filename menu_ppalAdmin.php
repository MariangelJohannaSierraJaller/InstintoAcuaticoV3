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
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->

         <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Administrar Usuarios</h1>
      <center><h2><?php echo $user['name']; ?>, estos son los usuarios que han creado su cuenta.</h2><center>
        <center><img src="assets/img/swirl.png" width="100px"></center>
        </div>
    <?php include("assets/table/table.html") ?> 
           
      </div>
 
  </section><!-- End Hero -->
    
    
    <section id="usuarios">
  
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
              <a href='modificarAdmin.php?id=<?php echo $results['id']; ?>'><button type='button' class="button4">Modificar</a>
              <a href="eliminarAdmin.php?id=<?php echo $results['id']; ?>"><button type='button' class="button2">Eliminar</a>
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
