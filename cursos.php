<?php
    require 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Niveles</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <?php include("assets/head/links.html") ?>

  <!-- Template Main CSS File -->
  <link href="assets/css/styleCursos.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
   <?php include("assets/head/headerHome.html") ?>
  <!-- End Header -->

  <main id="main">

 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Niveles</h1>
        </div>
      </div>
 
  </section><!-- End Hero -->

  <!--Services-->

    <section id="services" class="services">

      <div class="container" data-aos="fade-up">
        <center><img src="assets/img/nadador.gif" alt="funny GIF" width="200px"></center>

        <div class="row gy-4">


          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box purple">
              <h3>Nivel 1: Medusas</h3>
              <p>Ambientación/Respiración/Flotación/ Propulsión básica</p>
              <!--<a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <h3>Nivel 2: Castor</h3>
              <p>Brazada circular/Respiración lateral/ Libre completo</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <h3>Nivel 3: Cocodrilo</h3>
              <p>Patada de espalda/ Brazada de espalda/ Espalda completo</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-box red">
              <h3>Nivel 4: Rana</h3>
              <p>Patada de pecho/Brazada de pecho/ Respiración frontal/Pecho completo</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-box blue">
              <h3>Nivel 5: Delfín</h3>
              <p>Patada de delfín/Brazada doble/Mariposa completo</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <h3>Matronatación</h3>
              <p>Estimulación temprana a partir de los tres meses hasta los dos años para bebés.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
            <div class="service-box yellow">
              <h3>Hidroaeróbicos</h3>
              <p>Ejercicios funcionales en el medio acuático al ritmo de la música.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="900">
            <div class="service-box gray">
              <h3>Pre-Deportivos</h3>
              <p>Actividades lúdico-Deportivas y simulación de la competencia.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="1000">
            <div class="service-box black">
              <h3>Hidroterapia</h3>
              <p>Prevención y rehabilitación de lesiones en el medio acuático.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
        <section id="precio" class="precio">

          <div class="section-title" data-aos="zoom-in">
            <h2>Precio</h2>
          <?php
            $records = $con->prepare('SELECT * FROM valor');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          
          <h3><?php echo $results['descripcion']; ?></h3>
          <p><?php echo $results['precio']; ?> (<?php echo $results['clases']; ?>)</p>
          
          <?php } ?>
        </div>
      </section>

      <section id="recordatorio" class="recordatorio">
       <center> <img src="assets/img/rec.png" alt="" width=""><p>Recuerda iniciar sesión para solicitar nuestro servicio desde nuestro sitio.</p>
        <a href="Login.php" class="get-started-btn scrollto">Iniciar sesión</a>
       </center>
      </section>

 <!-- ======= Footer ======= -->
   <?php include("assets/footer/footer.html") ?>
   <!-- End Footer -->

   <?php include("assets/footer/links.html") ?>

</body>

</html>
