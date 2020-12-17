<?php
  session_start();

  $conn = mysqli_connect(
    'localhost', // Host
    'root',      // User
    '',          // Password
    'php_crud'   // Database
  ) or die(mysqli_erro($mysqli));

?>
