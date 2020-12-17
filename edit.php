<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuarios WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row        = mysqli_fetch_array($result);
    $nombre     = $row['nombre'];
    $apellido_p = $row['apellido_p'];
    $apellido_m = $row['apellido_m'];
    $direccion  = $row['direccion'];
  }
}

if (isset($_POST['update'])) {
  $id         = $_GET['id'];
  $nombre     = $_POST['nombre'];
  $apellido_p = $_POST['apellido_p'];
  $apellido_m = $_POST['apellido_m'];
  $direccion  = $_POST['direccion'];

  $query = "UPDATE usuarios set 
                   nombre     = '$title', 
                   apellido_p = '$description' 
                   apellido_m = '$description' 
                   direccion  = '$title', 
                   WHERE id   = $id";

  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario actualizado.';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group">
          <input name="nombre" type="text" class="form-control" 
          value="<?php echo $nombre; ?>" placeholder="Actualiza el nombre">
        </div>

        <div class="form-group">
          <input name="apellido_p" type="text" class="form-control" 
          value="<?php echo $apellido_p; ?>" placeholder="Actualiza el apellido paterno">
        </div>

        <div class="form-group">
          <input name="apellido_m" type="text" class="form-control" 
          value="<?php echo $apellido_m; ?>" placeholder="Actualiza el apellido materno">
        </div>

        <div class="form-group">
        <textarea name="direccion" class="form-control" cols="30" rows="10"><?php echo $direccion;?></textarea>
        </div>

        <button class="btn-success" name="update">
          Update
        </button>

      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
