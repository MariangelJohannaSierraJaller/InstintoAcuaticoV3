<?php
require 'Seguridad.php';
require 'conexion.php';

if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM contacto WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_GET['name']) && !empty($_GET['lastname'])  && !empty($_GET['email']) && !empty($_GET['phone']) && !empty($_GET['message'])) {
  $sql = "UPDATE contacto SET name=:name, lastname=:lastname, email=:email, phone=:phone, message=:message WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->bindParam(':name', $_GET['name']);
  $stmt->bindParam(':lastname', $_GET['lastname']);
  $stmt->bindParam(':email', $_GET['email']);
  $stmt->bindParam(':phone', $_GET['phone']);
  $stmt->bindParam(':message', $_GET['message']);
  $stmt->execute();
  header('Location:  contactoAdmin.php');
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
          <h1>Modificar Contacto</h1>
<center><img src="assets/img/respi.gif" alt="funny GIF" width="400px"></center>
        </div>
           
      </div>
 
     </section><!-- End Hero -->
    
    <?php if (!empty($user)) : ?>
    <?php endif; ?>

    <div class="formulario">
      <?php if (!empty($_GET['id'])) : ?>
        <form action="modificarContacto.php" method="get">
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <a href="index.php"><img src="assets/img/hero-img.png" alt=""></a>
                        <h3>INSTINTO ACUATICO</h3>
                        <p>Modifica las solicitudes de contacto</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Solicitud de Contacto</h3>
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" value="<?php echo $_GET['id'] ?>" type="hidden" name="id" >
                                        </div>
                                        <div class="form-group">
                                            <label>Correo: </label>
                                            <input class="form-control" type="email" name="email" value="<?php echo $results['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre: </label>
                                            <input type="text" name="name" value="<?php echo $results['name'] ?>"class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Apellidos: </label>
                                            <input type="text" name="lastname" value="<?php echo $results['lastname'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono: </label>
                                            <input type="text" name="phone" value="<?php echo $results['phone'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mensaje: </label>
                                            <<textarea name="message"><?php echo $results['message'] ?></textarea>
                                          </div>
                                            <?php endif; ?>
                                            <br>
                                            <div>
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
