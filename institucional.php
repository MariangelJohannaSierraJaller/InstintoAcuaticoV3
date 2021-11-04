<?php
    require 'conexion.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>

   <?php include("assets/default/head.html")?>
   <?php include("assets/head/links.html") ?>

  <!-- Template Main CSS File -->
  <link href="assets/css/styleInstitucional.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
   <?php include("assets/head/headerHome.html") ?><!-- End Header -->

  <main id="main">



<div >
  
<div id="carouselExample" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/portfolio/portfolio-details-1.jpeg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/portfolio/portfolio-details-3.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/services-4.jpeg" alt="Third slide">
    </div>
  </div>
</div>
</div>
</div>


   <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <center><h3><strong>Valores corporativos</strong></h3></center>
        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" data-aos="flip-right">
              <br>
              <p>Competitividad</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" data-aos="flip-right">
               <br>
              <p>Constancia</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="" data-aos="flip-right">
               <br>
              <p>Inclusión</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
             <img src="assets/img/clients/client-4.png" class="img-fluid" alt="" data-aos="flip-right">
               <br>
              <p>Disciplina</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
             <img src="assets/img/clients/client-5.png" class="img-fluid" alt="" data-aos="flip-right">
               <br>
              <p>Confianza</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
          <img src="assets/img/clients/client-6.png" class="img-fluid" alt="" data-aos="flip-right">
              <br>
              <p>Diversión</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

      <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
            <center><img src="assets/img/mision.png" class="img-fluid" width="400px"></center>
            <center><h3>Misión</h3></center>
            <p class="font-italic"><body style="text-align: justify;">
             Instinto Acuático es una institución que trabaja por el mejoramiento de la calidad de vida y la formación integral a través de servicios deportivos de formación, recreación, fortalecimiento y rehabilitación, dictados por personal altamente calificado, con el objetivo de brindar una experiencia personalizada, llena diversión y aprendizaje a través de un medio fabuloso para la salud: el agua.
            </p>
            </div>
          </div>



        </div>

      </div>

    </section><!-- End Values Section -->

          <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="box" data-aos="fade-up" data-aos-delay="400">
            <center><img src="assets/img/vision.png" class="img-fluid" alt=""></center>
              <center><h3>Visión</h3></center>
            <p class="font-italic"><body style="text-align: justify;">
            Instinto Acuático será para el año 2025 una institución con servicios deportivos a nivel formativo y competitivo, que cuente con instalaciones y tecnología de último nivel en sus sedes, ubicadas en las principales ciudades de Colombia, formando deportistas íntegros en cada una de nuestros servicios ofrecidos.
            </p>
            
            </div>
          </div>



        </div>

      </div>

    </section><!-- End Values Section -->
   <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

         <div class="section-title">
          <center><h3 data-aos="fade-in"><strong>Te acompaña en las clases</strong></h3></center>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="member" data-aos="fade-up">
                <?php
            $records = $con->prepare('SELECT * FROM instructores');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="item">
                    <div class="item-text">
                      <div class="pic"><img src="<?php echo $results['url']; ?>" alt="<?php echo $results['nombres']; ?>" width="200px" class="rounded-circle img-fluid"></div>
                        <h4><?php echo $results['nombres']; ?></h4>
                        <span><?php echo $results['rol']; ?></span>
                        <a href="https://wa.me/57<?php echo $results['telefono']; ?>" target="_blank"><i class="bx bxl-whatsapp"></i><?php echo $results['telefono']; ?></a>
                    </div>
                </div>
        <?php } ?>

          </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->


  <!-- ======= Footer ======= -->
   <?php include("assets/footer/footer.html") ?>
 <?php include("assets/footer/links.html") ?><!-- End Footer -->

</body>

</html>
