<?php
require 'Seguridad.php';
?>
<?php if (!empty($user)) : ?>
  <!DOCTYPE html>
  <html>

  <head>
  <?php include("assets/default/head.html")?>
<?php include("assets/head/links.html") ?>

    <!-- Template Main CSS File -->
    <link href="assets/css/styleRegistro.css" rel="stylesheet">
    <link href="assets/css/tabla.css" rel="stylesheet">
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php include("assets/head/headerRegistro.html") ?><!-- End Header -->

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



       <!-- ======= tablero Section ======= -->
  <section id="tablero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Tablero de Curiosidades</h1>
        </div>
      </div>
 
  </section><!-- End tablero -->

       <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/fuerzas.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up"><body style="text-align: justify;">
            <h3>¿Por qué las manos en el agua funcionan como las alas de un aeroplano?</h3>
          
<p>
De igual manera que las alas de un aeroplano, la manera más sencilla de entender las fuerzas que actúan sobre la mano de un nadador es separarlas entre fuerzas de fricción y fuerzas de
elevación. La fuerza de fricción actúa de manera proporcional a la velocidad del flujo con la que se encuentra. Por otro lado, la fuerza de elevación actúa perpendicularmente a la velocidad del flujo y su dirección depende del ángulo de inclinación de la mano.
</p>
<p>
La inclinación depende directamente del ángulo de ataque. La magnitud de la fuerzas de elevación y de fricción está relacionada al ángulo de ataque. La fuerza resultante es la suma de las fuerzas de elevación y de fricción. Esta es la verdadera fuerza que actúa sobre la mano del nadador mientras se mueve a través del agua.
</p>
<p>
El nadador puede mover sus manos en cualquier dirección tridimensional en el agua, causando fuerzas de
elevación y de fricción que también pueden actuar en cualquier dirección.</p>

          </div>
        </div>
      </div>
    </section><!-- End Details Section -->

              <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="box" data-aos="fade-up" data-aos-delay="400">
            <center><h3>Ejercicios de respiración para los más pequeños.</h3></center>

            <center><h2>Mi amigo el oso.</h2></center>
            <center><img src="assets/img/oso.png" alt=""></center>
           <p>
                  Acostado en una colchoneta (cama, mueble...) con un osito o peluche en su vientre (Debe ser un objeto liviano). el niño deberá tomar aire durante tres segundos y ver cómo su juguete favorito se eleva. Después deberá exhalar y volver a empezar.
                </p>
                <p>
                  Realizar el ejercicio durante 5 minutos.
                </p>
                <p>
                  Este ejercicio fortalecerá los circuitos cerebrales del niño para mejorar los procesos de atención y gestión emocional. Además le ayudará a regular la respiración para desenvolverse en la inmersión del medio acuático.
                </p>
                <center><h2>Respirando como elefantes. </h2></center>
                <center><img src="assets/img/elefante.png" alt=""></center>
                <p>
                  El niño acostado deberá estar de pie y con las piernas ligeramente separadas. Le indicaremos que se va a convertir en un elefante y que va a respirar como él. Deberá coger aire por la nariz de forma profunda y al hacerlo, levantará sus brazos como si estos fueran la última trompa del animal. A continuación es el momento de exhalar; para ello debe hacerlo por la boca de forma sonora y bajando los brazos mientras se inclina un poco llevando "la trompa del elefante" hacia abajo
                </p>
                <p>
                  Repetir 10 veces
                </p>
                <center><h2>El juego de la serpiente. </h2></center>
                <center><img src="assets/img/serpiente.png" alt=""></center>
                <p>
                  El niño se sentará en una silla manteniendo la espalda recta y poniendo las manos en su abdomen. A continuación le daremos la indicación de tomar aire profundamente por la nariz (vamos a contar 5 segundos), de manera que el niño note como se hincha su barriguita. Luego deberá dejar ir el aire por la boca haciendo el sonido de la serpiente. Debe ser un siseo sonoro que durará todo lo que ellos puedan.
                </p>
                <p>
                  Repetir 8 veces
                </p>
                <center><h2>El globo. </h2></center>
                <center><img src="assets/img/globo.png" alt=""></center>
                <p>
                  El niño se sentado con la espalda recta, deberá inflar una bomba, viendo como se hace cada vez más grande su globo. En este ejercicio el niño deberá ser consciente de la inhalación y exhalación
                </p>
                <p>
                  Hacerlo hasta inflar un globo de tamaño mediano
                </p>
                <center><h2>La respiración del leopardo. </h2></center>
                <center><img src="assets/img/leopardo.png" alt=""></center>
                <p>
                  Respiración diafragmática
                </p>
                <p>
                  Le indicaremos al pequeño que se ponga en el suelo en 4 apoyos (patas) como el leopardo. Ahora deben tomar aire por la nariz notando como se infla su barriguita y bajando su columna vertebral. A continuación, deben exhalar por la boca percibiendo a su vez como se vacia su barriguita y la espalda se eleva un poquito.
                </p>
                <p>
                  Repetir 10 veces
                </p>
            
            </div>

    </section><!-- End Values Section -->


  <!-- ======= Footer ======= -->
  <?php include("assets/footer/footer.html") ?><!-- End Footer -->


   <?php include("assets/footer/links.html") ?>

</body>

</html>