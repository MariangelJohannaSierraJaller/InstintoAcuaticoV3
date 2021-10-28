<?php
  require 'sesion.php';
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
			$type=0;
			$stmt->bindParam(':type', $type);
			
			
			if ($stmt->execute()) {
			  $message = 'Tu cuenta ha sido creada con éxito.';
			  $class="text-true";
			  $records = $con->prepare('SELECT id FROM usuarios WHERE email = :email');
			  $records->bindParam(':email', $_POST['email']);
			  if ($records->execute()){
				$results = $records->fetch(PDO::FETCH_ASSOC);
				$_SESSION['autentificado'] = $results['id'];
			  }
			} else {
			  $message = 'Ha ocurrido un error creando tu cuenta, inténtalo de nuevo.';
			  $tipo="text-false";
			}				
		}else{
			$message = $correo.' -Este email actualmente está vinculado a una cuenta.';
			$tipo="text-false";
		}
 
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Sign Up </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
	<?php if (!empty($message)): ?>
		<script>
		      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
		</script>
	<?php endif; ?>
	<nav class="main">
			<a href="index.php"><img src="assets/img/login.png" width="180px" height="180px" ></a>
		</nav>
	<div class="formulario">
		<form action="SignUp.php" method="post">
			        <input type="email" name="email" placeholder="Email" required maxlength="100">
				<input type="text" name="name" placeholder="Nombre(s)" required maxlength="20">
				<input type="text" name="lastname" placeholder="Apellidos" required maxlength="40">
			        <input type="tel" name="phone" placeholder="Teléfono/Celular" required maxlength="10">
			        <input type="text" name="direction" placeholder="Dirección" required maxlength="30">
				<input type="password" name="password" placeholder="Contraseña" required maxlength="20">
				<input type="submit" value="Registrarse">
			</form>
			<form action="Login.php" method="post">
				<input type="submit" value="Inicio de sesión">
		</form>
	</div>
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
</body>
</html>
