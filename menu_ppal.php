<?php
require 'Seguridad.php';
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>

    <?php include("assets/default/head.html")?>
    <?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/styleRegistro.css" rel="stylesheet">
    <link href="assets/css/tabla.css" rel="stylesheet">
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->


    <!-- ======= hero Section ======= -->
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

    </section><!-- End hero -->
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

<?php if ($user['type'] == 1) : ?>

 <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3 style=  "font-size: 14px;
  font-weight: 700;
  color: #4154f1;
  text-transform: uppercase;">Hola Administrador(a)</h3>
              <h2 style="font-size: 24px;
  font-weight: 700;
  color: #012970;">Te invitamos a explorar las funciones con las que cuentas por tener este perfil.</h2>
              <p style="margin: 15px 0 30px 0;
  line-height: 24px;">
                Puedes acceder a registros, actualizar secciones del sitio, descargar reportes y otras funciones que puedes conocer dándole clic al <a href="#">Manual de Usuario.</a>
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/administrador.jpeg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

 <?php endif; ?>

   <!-- ======= Why Us Section ======= -->
   <?php if ($user['type'] == 0) : ?>
    <section id="why-us" class="why-us">
      <div class="container">

         <center><img src="assets/img/clavado.gif" alt="funny GIF" width="200px"></center>

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content"><body style="text-align: justify;">
              <h3>Gracias por crear tu cuenta en Instinto Acuático</h3>
              <p>
                Para nosotros es muy importante que utilices los espacios que disponemos para que conozcas nuestra academia. Aquí tienes la oportunidad de acceder a espacios tales como:
              </p>

            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0"><body style="text-align: justify;">
                    <i class="bx bx-file"></i>
                    <h4>Solicitudes</h4>
                    <p>Realiza solicitud de los cursos y productos que ofrecemos.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0"><body style="text-align: justify;">
                    <i class="bx bx-chat"></i>
                    <h4>Contacto e Inscripción</h4>
                    <p>Dejános tu mensaje y te estableceremos un contacto contigo, también puedes formalizar tu inscripción en este espacio.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0"><body style="text-align: justify;">
                    <i class="bx bx-photo-album"></i>
                    <h4>Material Exclusivo</h4>
                    <p>Enterate de las noticias que publicamos para tí dandole clic <a href="menu_noticias.php">aquí</a>.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <?php endif; ?>
    </section><!-- End Why Us Section -->


        <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/tablero.png" width="100%">
              </div>
              <div class="card-body">
                <h5 class="card-title">¿Por qué las manos en el agua funcionan como las alas de un aeroplano?</h5>
                <!--<p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p-->
                <p class="card-text">Como fuente de propulsión, las manos constituyen un elemento de fácil control para la técnica del nadador, y por lo tanto representan un elemento importante a mejorar para el nadador competitivo.
Las manos de un nadador se asemejan a las alas de un aeroplano, en la manera como estas generan fuerza mientras se mueven a través del agua.</p>
            <a href="tablero.php #details">Leer más</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/tablero1.png" width="100%">
              </div>
              <div class="card-body">
                <h5 class="card-title">Ejercicios de respiración para los más pequeños.</h5>
                <p class="card-text">Trabajar la respiración con los niños es, a partes iguales, divertido y beneficioso para todos. Para ellos, porque aprenden a controlar sus emociones, practican su capacidad de atención y focalización. Además, los ejercicios de respiración para niños les ayudan a relajarse y tomar conciencia de su propio cuerpo y sus procesos</p>
                <a href="tablero.php #values">Leer más</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Events Section -->


  <!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?>
  <!-- End Footer -->
  <?php include("assets/footer/links.html") ?>
</body>

</html>