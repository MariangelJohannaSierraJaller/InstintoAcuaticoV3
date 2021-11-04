<?php
require 'Seguridad.php';
require 'conexion.php';

if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM registros WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_GET['email']) && !empty($_GET['Service_Name']) && !empty($_GET['AR_Date']) && !empty($_GET['Service_Date']) && !empty($_GET['Service_hour'])) {
  $sql = "UPDATE registros SET email=:email, Service_Name=:Service_Name, AR_Date=:AR_Date, Service_Date=:Service_Date, Service_hour=:Service_hour WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':email', $_GET['email']);
  $stmt->bindParam(':Service_Name', $_GET['Service_Name']);
  $stmt->bindParam(':AR_Date', $_GET['AR_Date']);
  $stmt->bindParam(':Service_Date', $_GET['Service_Date']);
  $stmt->bindParam(':Service_hour', $_GET['Service_hour']);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
  header('Location:  menu_ssUser.php');
}

?>
<?php if (!empty($user)) : ?>
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

    <?php include("assets/head/headerRegistro.html") ?>

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Modificar Servicio</h1>
<center><img src="assets/img/natacion.png"  alt=""></center>
        </div>
           
      </div>
 
     </section><!-- End Hero -->
      

     <?php if (!empty($_GET['id'])) : ?>
        <form action="modificar_ssUser.php" method="get">

          <div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Solicitud Servicio</h3>
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" value="<?php echo $_GET['id'] ?>" type="hidden" name="id" >
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Servicio: </label>
                                            <select type="text" name="Service_Name" required>
            <option value="">Seleccione</option>
          <option value="Matronatacion">Matronatación</option>
          <option value="Parvulos">Párvulos </option>
          <option value="Predeportivos">Predeportivos</option>
          <option value="Escolares">Escolares</option>
          <option value="Adultos ">Adultos </option>
          </select>
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

<!--footer-->
<?php include("assets/footer/footer.html") ?>
<!--end footer>
  <?php include("assets/footer/links.html") ?>