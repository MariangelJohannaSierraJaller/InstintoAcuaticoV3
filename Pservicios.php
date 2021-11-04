<?php
    require 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Portafolio de Servicios</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<?php include("assets/head/links.html") ?>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/stylePortafolio.css">
</head>

<body>

   <!-- ======= Header ======= -->
  <?php include("assets/head/headerHome.html") ?>
  <!-- End Header -->

  <section class="portafolio">
    <center><h1>Portafolio de Servicios</h1></center>
    <center><a href="index.php"><img src="assets/img/hero-img.png" width="220px"></a></center>
    <div class="container">
        <?php
            $records = $con->prepare('SELECT * FROM galeria');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="item">
                    <img src="<?php echo $results['url']; ?>" alt="<?php echo $results['service']; ?>" class="item-img">
                    <div class="item-text">
                        <h3><?php echo $results['service']; ?></h3>
                        <p><?php echo $results['description']; ?></p>
                    </div>
                </div>
        <?php } ?>
    </div>
    </section>
    <?php include("assets/footer/footer.html") ?>

   
</body>

</html>