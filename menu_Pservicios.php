<?php
require 'Seguridad.php';
require 'conexion.php';

$message = '';
$class = '';
$redig=False;

if (!empty($_POST['service']) && !empty($_POST['description'])) {
    $sql = "INSERT INTO galeria (service, description, url) VALUES (:service, :description, :url)";
    $stmt = $con->prepare($sql);
    
     $nombre=$_FILES['image']['name'];
    $archivo=$_FILES['image']['tmp_name'];

    $ruta="galeria";
    $ruta=$ruta."/".$nombre;

    move_uploaded_file($archivo,$ruta);
    
    $stmt->bindParam(':service', $_POST['service']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':url', $ruta);
    if ($stmt->execute()) {
        $message = 'Se creo el nuevo servicio de forma exitosa.';            
        $class = "text-true";
        $redig=True;
    } else {
        $message = 'No se ha podido crear el nuevo servicio.';
        $class = "text-false";
    }
}
?>
<?php if (!empty($user) && $user['type']==1) : ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title> Crear nuevo servicio </title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Template Main CSS File -->
        <link href="assets/css/styleLogin.css" rel="stylesheet">

        <!-- =======================================================
  * Template Name: Bocor - v2.2.1
  * Template URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    </head>

    <body>
        <?php if (!empty($message)) : ?>
            <div class="<?php echo $class; ?>">
                <p>
                    <center><?= $message ?></center>
                </p>
            </div>
            <br></br>
        <?php endif; ?>
        <nav class="main">
            <a href="index.php"><img src="assets/img/swirl.png"></a>
        </nav>
        <div class="formulario">
            <h1>Nuevo Servicio</h1>
            <form action="menu_Pservicios.php" method="post" enctype="multipart/form-data">
                <input type="text" name="service" required placeholder="Nombre del Producto">
                <input type="text" name="description" required placeholder="Descripcion del Producto">
                <input type="file" name="image" required>
                <br>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </body>
    <?php if ($redig==True) : ?>
    <script>
            setTimeout(alertFunc, 3000);

            function alertFunc() {
                location.replace("Pservicios.php")
            }
    </script>
    <?php endif; ?>
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
