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
          <h1>Registro Inscripciones</h1>
          <center><h2><?php echo $user['name']; ?>, estas son las inscripciones que se han formalizado hasta ahora.</h2><center>
        </div>
      </div>
 
  </section><!-- End Hero -->
    <section id="inscripcion">
    <table class="content-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre Alumno</th>
          <th>Nombre Acudiente</th>
          <th>Parentesco</th>
          <th>Edad Alumno</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Curso</th>
          <th>Acepta</th>
          <th>Mensaje</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $records = $con->prepare('SELECT * FROM inscripcion');
        $records->execute();
        while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['nombrealumno']; ?></td>
            <td><?php echo $results['nombreacudiente']; ?></td>
            <td><?php echo $results['parentesco']; ?></td>
            <td><?php echo $results['edadalumno']; ?></td>
            <td><?php echo $results['email']; ?></td>
            <td><?php echo $results['telefono']; ?></td>
            <td><?php echo $results['direccion']; ?></td>
            <td><?php echo $results['curso']; ?></td>
            <td><?php echo $results['acepta']; ?></td>
            <td><?php echo $results['mensaje']; ?></td>
            <td>
              <a href='modificar_ssAdmin.php?id=<?php echo $results['id']; ?>'><button type='button' class="button4">Modificar</a>
              <a href="eliminarInscripcion.php?id=<?php echo $results['id']; ?>"><button type='button' class="button2">Eliminar</a>
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