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

        $records = $con->prepare('SELECT * FROM contacto WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        if($records->execute()){
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $correo=$results['email'];
            $numero=$results['id'];
            if($numero<10){
                $numero="0".$numero;
            }
            $nombre=$results['name']." ". $results['lastname'];
            $info="Hola ".$nombre." espero que estes muy bien, te estaremos contactactando muy prontamente por tu correo: ".$results['email']." o te esteremos llamando a tu numero: ".$results['phone']." para ayudarte con tu problema";
            $asunto="Instinto Acuatico";
            $mjs='<!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>Instinto Acuatico</title>
                    <style type="text/css">
                        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
                        *{
                            padding:0;
                            margin:0;
                            box-sizing:bolder-box;
                        }
                        body{
                            position:relative;
                            background:#0c3040;
                            justify-content:center;
                            align-items:center;
                        }

                        .Title h1{
                            position:relative;
                            color:#fff;
                            font-size:3em;
                            margin-bottom:15px;
                            margin-left: 65px;
                        }
                        
                        .Title h1:before{
                            content:"";
                            position:absolute;
                            bottom:-5px;
                            left:0;
                            width:80px;
                            height:2px;
                            background:#1a5b87;
                        }

                        .CardContainer{
                            display:flex;
                            justify-content:center;
                            align-items:center;
                            flex-wrap:wrap;
                            margin:20px 0px;
                        }
                        
                        .CardContainer .card{
                            position:relative;
                            min-width:380px;
                            height:470px;
                            box-shadow:inset 5px 5px 5px rgba(0,0,0,0.2), inset -5px -5px 15px rgba(255,255,255,0.1), 5px 5px 15px rgba(0,0,0,0.3), -5px -5px 15px rgba(255,255,255,0.1);
                            border-radius:15px;
                            margin:30px;
                            margin-bottom:28px;
                        }
                        
                        
                        .CardContainer .card .box{
                            position:absolute;
                            top:20px;
                            left:20px;
                            right:20px;
                            bottom:20px;
                            background:#1a5b87;
                            border:2px solid #0c3040;
                            border-radius:15px;
                            box-shadow:0px 20px 50px rgba(0,0,0,0.5);
                            transition:0.5s;
                            display:flex;
                            justify-content:center;
                            align-items:center;
                            overflow:hidden;
                        }
                        
                        .CardContainer .card .box:before{
                            content:"";
                            position:absolute;
                            top:0;
                            left:0;
                            width:50%;
                            height:100%;
                            background:rgba(41,41,43,0.12);
                            pointer-events:none;
                        }
                        
                        .CardContainer .card .box:hover{
                            transform:translateY(-50px);
                            box-shadow:0px 40px 70px rgba(0,0,0,0.5);
                        }
                        
                        .CardContainer .card .content{
                            padding:20px;
                            text-align:center;
                        }
                        
                        .CardContainer .card .content h2{
                            position:absolute;
                            top:-10px;
                            right:30px;
                            font-size:8em;
                            font-family: "Poppins", sans-serif;
                            color:rgba(12,48,64, 0.05);
                        }
                            
                        .CardContainer .card .content h3{
                            font-size:1.8em;
                            color:rgba(255,255,255,0.5);
                            z-index:1;
                            transition:0.5s;
                        }
                        
                        .CardContainer .card .content p{
                            font-size:16px;
                            font-weight:300;
                            color:rgba(255,255,255,0.5);
                            z-index:1;
                            transition:0.5s;
                        }
                        
                        .CardContainer .card .content a{
                            position:relative;
                            display:inline-block;
                            padding:8px 20px;
                            margin-top:15px;
                            border-radius:20px;
                            text-decoration:none;
                            font-family: "Poppins", sans-serif;
                            font-weight:400;
                            color:#819DB0;
                            box-shadow:0px 10px 20px rgba(0,0,0,0.2);
                            
                        }
                        .CardContainer .card .content a{
                            background: #15415F;
                            box-shadow:0px 10px 20px rgba(0,0,0,0.2);
                        }

                        .copyrightText{
                            padding:8px 0px;
                            width:100%;
                            background:#15415f;
                            text-align:center;
                            color:#FFF;
                            font-size:15px;
                        }

                        .copyrightText a{
                            text-decoration: none;
                            color:#FFF;
                            font-size:15px;
                        }
                    </style>
                </head>
                <body>
                        <div class="Title">
                            <h1>Carta de Contacto</h1>
                        </div>
                        <div class="CardContainer">
                            <div class="card">
                                <div class="box">
                                    <div class="content">
                                        <h2>'.$numero.'</h2>
                                        <h3>'.$nombre.'</h3>
                                        <p>'.$info.'</p>
                                        <a href="">Leer Mas</a>
                                    </div>	
                                </div>
                            </div>
                        </div>
                        <div class="copyrightText">
                            <p>Copyright © 2021 <a href="https://instintoacuatico.herokuapp.com/">Instinto Acuatico</a> . Todos los derechos reservados.</p>

                        </div>
                </body>
            </html>';
            $email=mail($correo,$asunto,$mjs);
            if($email){
                $message = $message." Ademas se envio un correo a: ".$correo;
                $tipo = "error";
            } else{
                $message = $message." No se envio un correo a: ".$correo;
                $tipo = "error";
            }
        } else {
        $message = 'Tu solicitud de Contacto no fue Creada con exito';
        $tipo = "error";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Instinto Acuático</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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
                    <div class="<?php echo $class; ?>">
                        <p><center><?= $message ?></center></p>
                    </div>
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
