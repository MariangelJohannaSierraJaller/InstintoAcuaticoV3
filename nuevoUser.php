<?php
require 'Seguridad.php';
require 'conexion.php';
  
  $message = '';
  $tipo = '';
  
  if ( !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['phone'])  && !empty($_POST['direction'])  && !empty($_POST['password'])){
		$records = $con->prepare('SELECT id, email FROM usuarios WHERE email = :email');
		$records->bindParam(':email', $_POST['email']);
		
		if ($records->execute()){
			$results = $records->fetch(PDO::FETCH_ASSOC);
			$correo=$_POST['email'];
			if ($correo==$results['email']) {
				$repetido=True;
			} else{
				$repetido=False;
			}
		} else {
			$repetido=False;
		}
		
		if($repetido==False){
			$sql = "INSERT INTO usuarios (email, name, lastname, phone, direction, password, type) VALUES (:email, :name, :lastname, :phone, :direction, :password, :type)";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':email', $_POST['email']);
			$stmt->bindParam(':name', $_POST['name']);
			$stmt->bindParam(':lastname', $_POST['lastname']);
			$stmt->bindParam(':phone', $_POST['phone']);
			$stmt->bindParam(':direction', $_POST['direction']);
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':type', $_POST['type']);
			
			
			if ($stmt->execute()) {
			  $message = 'Tu cuenta ha sido creada con éxito.';
			  $tipo="success";
			  $records = $con->prepare('SELECT id FROM usuarios WHERE email = :email');
			  $records->bindParam(':email', $_POST['email']);
			  if ($records->execute()){
				$results = $records->fetch(PDO::FETCH_ASSOC);
				$_SESSION['autentificado'] = $results['id'];
			  }
			} else {
			  $message = 'Ha ocurrido un error creando tu cuenta, inténtalo de nuevo.';
			  $tipo="error";
			}				
		}else{
			$message = $correo.' -Este email actualmente está vinculado a una cuenta.';
			$tipo="error";
		}
 
	}
?>

<!DOCTYPE html>
  <html>

  <head>
  <?php include("assets/default/head.html")?>

   <?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script><style>


</style><html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script><style>


</style>

  </head>

  <body>
   <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Agregar Usuario</h1>
        <center><img src="assets/img/usuario.png" width="100px"></center>
        </div>
           
      </div>
 
  </section><!-- End Hero -->

<?php if (!empty($message)): ?>
    <script>
      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
    </script>
  <?php endif; ?>

  
  <form action="nuevoUser.php" method="post">

          <div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Datos de Usuario</h3>
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Correo: </label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre: </label>
                                           <input type="text" name="name" id="name" class="form-control" placeholder="Nombre(s)" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Apellidos: </label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellido(s)" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Celular: </label>
                                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Celular"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Direcion: </label>
                                            <input type="direction" name="direction" id="phone" class="form-control" placeholder="Dirección" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña: </label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                                          </div>
                                        <div class="form-group">
                                            <label>Tipo de Usuario: </label>
                                            <select type="text" name="type" id="type" class="form-control"required>
                                              <option>1</option>
                                              <option>0</option>
                                            </select>
                                          </div>
                                          
                                            
                                            <br>
                                            <div>
                                    <button type="submit" class="button4">Guardar</button>
                                    <a href="menu_ppal.php"><button type='button' class="button2">Cancelar</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div> 
        </form>

  <?php if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])): ?>
      <?php if($repetido==False): ?>
        <script>
          setTimeout(alertFunc, 4000);
          function alertFunc() {
            location.replace("menu_ppal.php")
          }
        </script>
      <?php endif; ?>
    <?php endif; ?>
<!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->
  <?php include("assets/footer/links.html") ?>
</body>
</html>
