<?php

include('db.php');

if (isset($_POST['save_user'])) {

  $nombre     = $_POST['nombre'];
  $apellido_p = $_POST['apellido_p'];
  $apellido_m = $_POST['apellido_m'];
  $direccion  = $_POST['direccion'];

  $query = "INSERT INTO usuarios(nombre, apellido_p, apellido_m, direccion) VALUES ('$nombre', '$apellido_p', '$apellido_m', '$direccion')";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query fallo.");
  }

  $_SESSION['message'] = 'Usuario agregado.';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
