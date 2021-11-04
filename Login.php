<?php
require 'sesion.php';
require 'conexion.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $con->prepare('SELECT * FROM usuarios WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  if($records->execute()){
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $tipo = '';
    if($_POST['email']==$results['email']){
      if (password_verify($_POST['password'], $results['password'])) {
        $_SESSION['autentificado'] = $results['id'];
        header("Location: menu_ppal.php");
      } else {
        $message='La contraseña es incorrecta';
        $tipo = 'error';
      }
    }else {
      $message = 'El usuario es incorrecto';
      $tipo = 'error';
    }
  }else {
    $message = 'El usuario o la contraseña son incorrectos';
    $tipo = 'error';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("assets/default/head.html")?>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">

    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php if (!empty($message)): ?>
    <script>
      Swal.fire({icon:"<?php echo($tipo); ?>",title:"<?php echo($message); ?>",timer:"6000",timerProgressBar:"true"});
      </script>
  <?php endif; ?>
  
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/img/inicionuevo.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <a href="index.php"><img src="assets/img/foot.png" alt="logo" class="logo"></a>
              </div>
              <p class="login-card-description">Inicia Sesión</p>
               <form action="Login.php" method="post">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group mb-7">
                    <label>Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Iniciar sesión" required>
                </form>
                <p class="login-card-footer-text">¿No tienes una cuenta? <a href="SignUp.php" class="text-reset">Regístrate aquí</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
