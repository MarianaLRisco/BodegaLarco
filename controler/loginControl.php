<?php
require ("./bd/conexion.php");
$alert = '';
session_start();

if (isset($_SESSION['active']) && $_SESSION['active'] == true) {
  header('location: inicio.php');
  exit();
} else {
  if (!empty($_POST)) {
    if (empty($_POST['clave']) || empty($_POST['usuario'])) {
      $alert = "Ingrese sus datos.";
    } else {
      $user = $_POST['usuario'];
      $pass = $_POST['clave'];

      $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario='$user' and clave='$pass' and estado_u=1 ");
      $resul = mysqli_num_rows($query);

      if ($resul > 0) {
        $data = mysqli_fetch_array($query);
        print_r($data);
        // $_SESSION['active'] = true;
        $_SESSION['iduser'] = $data['idusuario'];
        $_SESSION['nombre'] = $data['nombre'];
        $_SESSION['apellido'] = $data['Apellido'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['user'] = $data['usuario'];
        $_SESSION['rol'] = $data['rol'];

        if (isset($_POST['flexCheckDefault'])) {
          // El usuario ha seleccionado mantener la sesión iniciada
          $_SESSION['active'] = true;
        }

        header('location: inicio.php');
        exit();
      } else {
        $alert = "El usuario o contraseña no existen";
        session_destroy();
      }
    }
  }
}

?>