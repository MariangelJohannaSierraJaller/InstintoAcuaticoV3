<?php
require 'Seguridad.php';
require 'conexion.php';

if(!empty($_GET['id']) && !empty($user) && $user['type']==1 ){
  $records = $con->prepare('SELECT * FROM usuarios WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_GET['email']) && !empty($_GET['name']) && !empty($_GET['lastname']) && !empty($_GET['phone']) && !empty($_GET['direction'])) {
  $sql = "UPDATE usuarios SET email=:email, name=:name, lastname=:lastname, phone=:phone, direction=:direction, type=:type WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':email', $_GET['email']);
  $stmt->bindParam(':name', $_GET['name']);
  $stmt->bindParam(':lastname', $_GET['lastname']);
  $stmt->bindParam(':phone', $_GET['phone']);
  $stmt->bindParam(':direction', $_GET['direction']);
  $stmt->bindParam(':type', $_GET['type']);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
  header('Location:  menu_ppalAdmin.php');
}

?>
<?php if (!empty($user) && $results['type'] == 0) : ?>
    
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
          <h1>Modificar Datos</h1>
<center><img src="assets/img/salt.gif" alt="funny GIF" width="400px"></center>
        </div>
           
      </div>
 
     </section><!-- End Hero -->
      
  
    <?php if (!empty($user)) : ?>
    <?php endif; ?>

   
      <?php if (!empty($_GET['id'])) : ?>
        <form action="modificarAdmin.php" method="get">

          <div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Datos de Usuario</h3>
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
                                            <label>Direccion: </label>
                                            <input type="text" name="direction" value="<?php echo $results['direction'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo de Usuario: </label>
                                            <input type="text" name="type" value="<?php echo $results['type'] ?>" class="form-control">
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
