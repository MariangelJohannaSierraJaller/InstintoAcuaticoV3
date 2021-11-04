<?php
require 'conexion.php';

$message = '';
$tipo = '';

if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['phone'])  && !empty($_POST['message'])){
    $sql = "INSERT INTO contacto (name, lastname, email, phone, message) VALUES (:name, :lastname, :email, :phone, :message)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':message', $_POST['message']);

    if ($stmt->execute()) {
        $message = 'Tu solicitud de Contacto fue Creada con exito';
        $tipo = "success";
    } else{
        $message = 'Tu solicitud de Contacto no fue Creada con exito';
        $tipo = "error";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <?php include("assets/default/head.html")?>
  <link href="assets/css/styleContacto.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="ContactoBanner">
            <video autoplay muted loop>
                <source src="assets/img/backgroundvideo.mp4" type="video/mp4">
            </video>
        <section >
            <div class="ContactoContainer">
                <form action="contacto.php" method="post">
                    <div class="logo"><a href="index.php"><img src="assets/img/login.png"></a></div>
                    <h1>Solicitud de Contacto</h1>
                    <?php if (!empty($message)) : ?>
                        <script>
                          Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
                        </script>
                    <?php endif; ?>
                        <div class="formsContacto">
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="name" required>
                                    <span class="text">Nombres:</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="lastname" required>
                                    <span class="text">Apellidos:</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="phone" required>
                                    <span class="text">Telefono:</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="email" required>
                                    <span class="text">Correo:</span>
                                </div>
                            </div>
                        </div>
                    <div class="formsContacto">
                        <div  class="col">
                            <div class="inputBox textarea">
                                <textarea required name="message"></textarea>
                                <span class="text">Mensaje:</span>
                            </div>
                        </div>
                    </div>
                    <div class="formsContacto">
                        <div  class="col">
                            <input type="submit">
                        </div>
                    </div>
                </form>    
            </div>
        </section>
    </div>
</body>
</html>
