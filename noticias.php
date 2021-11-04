<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
  $tipo = '';
$redig=False;

if (!empty($_POST['titulo']) && !empty($_POST['descripcion'])) {
    $sql = "INSERT INTO noticias (titulo, descripcion, url) VALUES (:titulo, :descripcion, :url)";
    $stmt = $con->prepare($sql);
    
     $nombre=$_FILES['image']['name'];
    $archivo=$_FILES['image']['tmp_name'];

    $ruta="galeria";
    $ruta=$ruta."/".$nombre;

    move_uploaded_file($archivo,$ruta);
    
   $stmt->bindParam(':titulo', $_POST['titulo']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);
    $stmt->bindParam(':url', $ruta);
    if ($stmt->execute()) {
        $message = 'Se creo la noticia en el tablero.';            
        $class = "text-true";
        $redig=True;
    } else {
        $message = 'No se creo la noticia en el tablero.';
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
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->
    
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
        <div class="formulario4">
            <h1>Nueva Noticia</h1>
            <p>Procura que las imagenes sean 524x525 por estética.</p>
            <form action="noticias.php" method="post" enctype="multipart/form-data">
                <input type="text" name="titulo" required placeholder="Titulo de la Noticia">
                <input type="text1" name="descripcion" required placeholder="Descripcion de la Noticia">
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
                location.replace("menu_noticias.php")
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
