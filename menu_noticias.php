<?php
    require 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Noticias</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<?php include("assets/head/links.html") ?>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/StylePortafolio.css" rel="stylesheet">

</head>

<body>

      <!-- ======= Header ======= -->
  <?php include("assets/head/headerHome.html") ?><!-- End Header -->

    <center><img src="assets/img/fotos1.jpeg" width="100%"></center>
    <center><h1>Noticias</h1></center>
    <center><a href="index.php"><img src="assets/img/login.png" width="220px"></a></center>
    <div class="container">
        <?php
            $records = $con->prepare('SELECT * FROM noticias');
            $records->execute();
            while ($results = $records->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="item">
                    <img src="<?php echo $results['url']; ?>" alt="<?php echo $results['titulo']; ?>" class="item-img">
                    <div class="item-text">
                        <h3><?php echo $results['titulo']; ?></h3>
                        <p><?php echo $results['descripcion']; ?></p>
                    </div>
                </div>
        <?php } ?>
    </div>

<!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->

  <?php include("assets/footer/links.html") ?>

</body>

</html>





