<?php
require 'conexion.php';

$message = '';
  $tipo = '';

if (!empty($_POST['nombrealumno']) && !empty($_POST['nombreacudiente']) && !empty($_POST['parentesco']) && !empty($_POST['edadalumno'])  && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['curso']) && !empty($_POST['acepta']) && !empty($_POST['mensaje'])){
    $sql = "INSERT INTO inscripcion (nombrealumno, nombreacudiente, parentesco, edadalumno, email, telefono, direccion, curso, acepta, mensaje) VALUES (:nombrealumno, :nombreacudiente, :parentesco, :edadalumno, :email, :telefono, :direccion, :curso, :acepta, :mensaje)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nombrealumno', $_POST['nombrealumno']);
    $stmt->bindParam(':nombreacudiente', $_POST['nombreacudiente']);
    $stmt->bindParam(':parentesco', $_POST['parentesco']);
    $stmt->bindParam(':edadalumno', $_POST['edadalumno']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':curso', $_POST['curso']);
    $stmt->bindParam(':acepta', $_POST['acepta']);
    $stmt->bindParam(':mensaje', $_POST['mensaje']);

        if ($stmt->execute()) {
        $message = 'Se formalizo tu inscripción con exito';
        $tipo="success";

        $records = $con->prepare('SELECT * FROM inscripcion');
    }else {
        $message = 'No se formalizó tu inscripción';
        $tipo="error";
        }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("assets/default/head.html")?>

    <link href="assets/css/inscripcion.css" rel="stylesheet">
</head>
<body>
    <div class="ContactoBanner">
        <section >
            <div class="ContactoContainer">
                <form action="inscripcion.php" method="post">
                    <div class="logo"><a href="index.php"><img src="assets/img/hero-img.png" widht="180px"></a></div>
                    <h1>Formalización de Inscripción</h1>
                    <?php if (!empty($message)) : ?>
      <script>
      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
    </script>
                    <?php endif; ?>
                        <div class="formsContacto">
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="nombrealumno" required>
                                    <span class="text">Nombre completo alumno*</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="nombreacudiente" >
                                    <span class="text">Nombre acudiente</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="parentesco" >
                                    <span class="text">Parentesco</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="edadalumno" required>
                                    <span class="text">Edad alumno*</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="email" required>
                                    <span class="text">Email*</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="telefono" required>
                                    <span class="text">Telefono/Celular*</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                    <input type="text" name="direccion" required>
                                    <span class="text">Dirección*</span>
                                </div>
                            </div>
                            <div  class="col">
                                <div class="inputBox">
                                <select type="text" name="curso" required>
                                <option value="">Seleccione</option>
                                <option value="Matronatacion">Matronatación</option>
                                <option value="Parvulos">Párvulos </option>
                                <option value="Predeportivos">Predeportivos</option>
                                <option value="Escolares">Escolares</option>
                                <option value="Adultos ">Adultos </option>
                                </select>
                                <span class="text">Curso que va a tomar*</span>

                                </div>
                            </div>
                            <div  class="col">
                                
    <a href="terminos.pdf"><button type='button' class="button1">Términos<input type="checkbox" name="acepta" required/></a>

                            </div>
                        </div>
                    <div class="formsContacto">
                        <div  class="col">
                            <div class="inputBox textarea">
                                <textarea required name="mensaje"></textarea>
                                <span class="text">Comentario*</span>
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