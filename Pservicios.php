<?php
    require 'conexion.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <title>portafolio de Servicios</title>
    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/stylePortafolio.css">
</head>

<body>
   <!-- ======= Header ======= -->
  <?php include("assets/head/HomeHeader.html") ?>
  <!-- End Header -->
    <h2><center>Servicios<img src="galeria/galeria.png"></center></h2>
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
</body>

</html>