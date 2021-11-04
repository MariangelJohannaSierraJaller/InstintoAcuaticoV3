<?php
require 'Seguridad.php';
require 'conexion.php';

if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM instructores WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_POST['nombres']) && !empty($_POST['rol']) && !empty($_POST['telefono'])) {
  $sql = "UPDATE instructores SET nombres=:nombres, rol=:rol, telefono=:telefono, url=:url WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->bindParam(':nombres', $_POST['nombres']);
  $stmt->bindParam(':rol', $_POST['rol']);
  $stmt->bindParam('telefono', $_POST['telefono']);

    if(!empty($nombre=$_FILES['image']['type'])){
        $nombre=str_replace("/", ".", $nombre);
        $nombre=str_replace("image", $_POST['service'], $nombre);
        $archivo=$_FILES['image']['tmp_name'];
        $ruta="galeria";
        $ruta=$ruta."/".$nombre;
        unlink( $_POST['url']);
        move_uploaded_file($archivo,$ruta);
    } else{
        $ruta=$results['url'];
    }
  $stmt->bindParam(':url', $ruta);
  $stmt->execute();
  header('Location:  menu_instructoresAdmin.php');
}

?>
<?php if (!empty($user) && $user['type'] == 1) : ?>
  <!DOCTYPE html>
  <html>

  <head>
  <?php include("assets/default/head.html")?>
<?php include("assets/head/links.html") ?>

    <html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script><style>


</style><html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script><style>


</style>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
  </head>

  <body>
   <!-- ======= Header ======= -->
   <?php include("assets/head/headerRegistro.html") ?><!-- End Header -->

     <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Modificar Instructor(a)</h1>
          <center><img src="assets/img/profe.png" alt="" ></center>

        </div>
      </div>
 
  </section><!-- End Hero -->
  <br>
  
    <?php if (!empty($user)) : ?>
    <?php endif; ?>
    <div class="formulario">
      <?php if (!empty($_GET['id'])) : ?>
        <form action="modificar_instructores.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
<div class="container register">
                <div class="row">

                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Instructor(a)</h3>
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" value="<?php echo $_GET['id'] ?>" type="hidden" name="id" >
                                        </div>
                                      <div class="form-group">
                                            <label>Nombre: </label>
                                            <input type="text" name="nombres" value="<?php echo $results['nombres'] ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Rol: </label>
                                            <input type="text" name="rol" value="<?php echo $results['rol'] ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Telefono: </label>
                                            <input type="text" name="telefono" value="<?php echo $results['telefono'] ?>" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Ruta(se actualiza al cambiar la imagen): </label>
                                            <input type="text" name="url" value="<?php echo $results['url'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Imagen: </label>
                                            <img src="<?php echo $results['url'] ?>" alt="<?php echo $results['service'] ?>" style="width:40%">
                                            <input type="file" name="image">
                                        </div>
                                        
                                            <?php endif; ?>
                                            <br>
                                    <button type="submit" class="button4">Guardar</button>
                                    <a href="menu_ppal.php"><button type='button' class="button2">Cancelar</button></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
 
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
