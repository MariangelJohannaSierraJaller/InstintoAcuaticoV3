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
    <header id="header">
      <div class="container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.php">INSTINTO ACUÁTICO<span></span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="drop-down"><a href="#"><?php echo $user['email']; ?><img src="assets/img/icon_perfil.png" width="30" height="30" alt="<?php echo $user['name'] . " " . $user['lastname']; ?>"></a>
              <ul>
                <li><a href="menu_ppal.php">Datos de Usuario</a></li>
                <?php if ($user['type'] == 1) : ?>
                  <li><a href="#">Administrar Usuarios</a></li>
                <?php endif; ?>
                <li><a href="cerrar.php">Cerrar Sesion</a></li>
              </ul>
            </li>
            <li><a href="#">.</a></li>
            <li class="drop-down"><a href="">Otros</a>
              <ul>
                <li><a href="#">inicio</a></li>
                <li><a href="#">Sobre nosotros</a></li>
                <li class="drop-down"><a href="#">Cursos</a>
                  <ul>
                    <li><a href="#">Curso 1</a></li>
                    <li><a href="#">Curso 2</a></li>
                    <li><a href="#">Curso 3</a></li>
                    <li><a href="#">Curso 4</a></li>
                    <li><a href="#">Curso 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Vitrina</a></li>
                <li><a href="#">Pre-matriculas</a></li>
                <li><a href="#">Contacto</a></li>
              </ul>
            </li>
          </ul>
        </nav><!-- .nav-menu -->
      </div>
    </header><!-- End Header -->
    <?php if (!empty($user) && $user['type'] == 1) : ?>
      <h1> <?php echo $user['email']; ?></h1>
    <?php endif; ?>
    <h4>
      <center>Datos de Contacto</center>
    </h4>
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
              <a href='modificarContacto.php?id=<?php echo $results['id']; ?>'><button type='button' class="btn btn-success">Modificar</a>
              <a href="eliminarContacto.php?id=<?php echo $results['id']; ?>"><button type='button' class="btn btn-danger">Eliminar</a>
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