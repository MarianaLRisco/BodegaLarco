<?php
 include('controler/loginControl.php');
?>


<!doctype html>
<html lang="en">

<head>
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css?48">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/libs/jquery-3.7.0.min.js" charset="utf-8"></script>
  <!-- icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="icon" type="image/png" href="imagenes/LARCO.png">
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" stylesheethref="assets/plugins/DataTables/datatables.min.css">
  <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.13.4/css/dataTables.bootstrap5.min.css">
  <script src="js/login.js?58"></script>
 
  <!-- Title -->
  <title>Login Larco</title>
</head>

<body>
  <section class="login-content">
    <div id="login-box" class="login-box">
      <form class="login-form" action="" method="post">
        <h3 class="login-head"><ion-icon size="large" name="person-sharp"></ion-icon> Inicia Sesión</h3>
        <div class="mb-3">
          <label class="font-text">Usuario</label>
          <input class="form-control form-control-lg" type="text" name="usuario" id="usuario" placeholder="Ingrese su correo" autofocus>
        </div>
        <div class="mb-3">
          <label class="font-text">Contraseña</label>
          <input class="form-control form-control-lg" type="password" name="clave" placeholder="Ingrese su contraseña" id="clave">
        </div>
        <?php if (!empty($_POST) && isset($alert)) : ?>
          <div id="alert" class="alert alert-danger fade show"><?php echo $alert; ?></div>
        <?php endif; ?>
        <div class="row mb-3">
          <div class="col-md-7 utility">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Mantener la sesión iniciada
              </label>
            </div>
          </div>
          <div class="col-md-5 mb-2">
            <a href="#" id="forget" class="text-forgot" data-toggle="flip">Olvidé mi contraseña?</a>
          </div>
        </div>
       
        <div class="mb-3 btn-container">
          <button type="submit" id="login-button" class="btn btn-primary">Iniciar Sesión</a>
        </div>
      </form>
      <form class="forget-form" action="index.php">
        <h3 class="login-head "><ion-icon size="large" name="lock-closed"></ion-icon> Olvidaste tu constraseña?</h3>
        <div class="mb-3">
          <label class="font-text">Email</label>
          <input class="form-control form-control-lg" type="text" placeholder="Ingrese su Email">
        </div>

        <div class="mb-3 btn-container">
          <button class="btn btn-primary d-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Enviar</button>
        </div>
        <div class="mb-3 mt-3">
          <a href="#" id="volver" class="text-forgot" data-toggle="flip"><ion-icon name="chevron-back-outline"></ion-icon>Volver al Login</a>
        </div>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.7.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <!-- ionIcon -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- flipped -->
  <script type="text/javascript">
    // Login Page Flipbox control-lg
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7705c14d19b2951e","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>

</html>