<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
  $tipo = '';
$redig=False;

if (!empty($_POST['nombres']) && !empty($_POST['rol']) && !empty($_POST['telefono'])) {
    $sql = "INSERT INTO instructores (nombres, rol, telefono, url) VALUES (:nombres, :rol, :telefono, :url)";
    $stmt = $con->prepare($sql);
    $nombre=$_FILES['image']['name'];
    $archivo=$_FILES['image']['tmp_name'];

    $ruta="galeria";
    $ruta=$ruta."/".$nombre;

    move_uploaded_file($archivo,$ruta);
    
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':rol', $_POST['rol']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':url', $ruta);

    if ($stmt->execute()) {
        $message = 'Se insertó el/la nuevo(a) instructor(a) de forma exitosa.';            
        $class = "text-true";
        $redig=True;
    } else {
        $message = 'No se insertó el/la nuevo(a) instructor(a) de forma exitosa.';
        $class = "text-false";
    }
}
?>

<?php if (!empty($user) && $user['type']==1) : ?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php include("assets/default/head.html")?>
    <?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/camposTexto.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
     <!-- ======= Header ======= -->
   <?php include("assets/head/headerRegistro.html") ?><!-- End Header -->
    
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
        </div>
              <?php if (!empty($message)) : ?>
      <script>
      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
    </script>
      </div>
    <?php endif; ?>
        <div class="formulario2">
            <h1>Nuevo Instructor(a)</h1>
            <p>Se recomienda una imagen 600x600</p>
            <form action="instructoresAdmin.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nombres" required placeholder="Nombre completo">
                <input type="text" name="rol" required placeholder="Rol que va a desempeñar">
                <input type="text" name="telefono" required placeholder="Téléfono">
                <input type="file" name="image" required>

                <br>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </body>
    <?php if ($redig==True) : ?>
    <script>
            setTimeout(alertFunc, 3000);

            function alertFunc() {
                location.replace("institucional.php")
            }
    </script>
    <?php endif; ?>
    </html>
      </div>
 
  </section><!-- End Hero -->

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
