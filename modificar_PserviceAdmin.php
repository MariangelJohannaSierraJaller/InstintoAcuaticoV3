<?php
require 'Seguridad.php';
require 'conexion.php';

if (!empty($_GET['id'])) {
  $records = $con->prepare('SELECT * FROM galeria WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_GET['id']) && !empty($_POST['service']) && !empty($_POST['description'])) {
  $sql = "UPDATE galeria SET service=:service, description=:description, url=:url WHERE id = :id";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->bindParam(':service', $_POST['service']);
  $stmt->bindParam(':description', $_POST['description']);

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
  header('Location:  menu_PserviciosAdmin.php');
}

?>
<?php if (!empty($user) && $user['type'] == 1) : ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Instinto Acuático</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    <link href="assets/css/styleLogin.css" rel="stylesheet">
  </head>

  <body>
    <?php if (!empty($user)) : ?>
      <h1> <?php echo $user['email']; ?></h1>
    <?php endif; ?>
    <h4>
      <center>Modificar Datos</center>
    </h4>
    <div class="formulario">
      <?php if (!empty($_GET['id'])) : ?>
        <form action="modificar_PserviceAdmin.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?> ">

          <label>Servicio: </label>
          <select type="text" name="service" required>
            <option value="<?php echo $results['service'] ?>"><?php echo $results['service'] ?></option>
          </select>

          <label>Descripción: </label>
          <input type="text" name="description" value="<?php echo $results['description'] ?>"><br>

          <label>Ruta(se actualiza al cambiar la imagen): </label>
          <input type="text" name="url" value="<?php echo $results['url'] ?>"><br>

          <label>Imagen: </label><br>
          <img src="<?php echo $results['url'] ?>" alt="<?php echo $results['service'] ?>" style="width:40%"><br><br>
          <input type="file" name="image">
            <br>
            <br>

        <?php endif; ?>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
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