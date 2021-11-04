<?php
    require 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("assets/default/head.html")?>
  <?php include("assets/head/links.html") ?>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>


  <!-- ======= Header ======= -->
  <?php include("assets/head/headerHome.html") ?><!-- End Header -->

   <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Vitrina</h1>
        </div>
      </div>
 
  </section><!-- End Hero -->

 <center><img src="assets/img/productos.png" width="100%" ></center>


    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <div class="row">

            <?php
            $records = $con->prepare('SELECT * FROM vitrina');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <img src="<?php echo $results['url']; ?>" alt="<?php echo $results['implemento']; ?>" class="img-fluid" alt="">
              <h3><?php echo $results['implemento']; ?></h3>
              <p><?php echo $results['descripcion']; ?></p>
            </div>
          </div>

        </div>
<?php } ?>
      </div>

    </section><!-- End Values Section -->

     

 <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todo</li>
              <li data-filter=".filter-app">Gorros</li>
              <li data-filter=".filter-card">Gafas</li>
              <li data-filter=".filter-cop">Juguetes</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pdoce.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pdoce.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pcinco.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pcinco.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-cop">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pdiez.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pdiez.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
              <h4>Juguetes</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pnueve.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pnueve.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
                <p>Gafas</p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pdos.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pdos.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gafas</h4>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/psiete.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/psiete.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
                <p>Gafas</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pseis.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pseis.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
                <p>Gafas</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pcuatro.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/pcuatro.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
                <p>Gafas</p>
              </div>
            </div>
          </div>


        <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/ptres.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/ptres.jpg" data-gall="portfolioGallery" class="portfolio-lightbox"><i class="icofont-plus-circle"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Gorros</h4>
                <p>Gafas</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  <!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->

  <?php include("assets/footer/links.html") ?>

</body>

</html>
