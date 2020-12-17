<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">

  <div class="row">

    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">

        <form action="save_user.php" method="POST">

          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>

          <div class="form-group">
          <label for="apellido_p">Apellido paterno:</label>
            <input type="text" name="apellido_p" class="form-control" placeholder="Apellido paterno" autofocus>
          </div>

          <div class="form-group">
          <label for="apellido_m">Apellido materno:</label>
            <input type="text" name="apellido_m" class="form-control" placeholder="Apellido materno" autofocus>
          </div>

          <div class="form-group">
          <label for="direccion">Dirección:</label>
            <textarea name="direccion" rows="2" class="form-control" placeholder="Dirección"></textarea>
          </div>

          <input type="submit" name="save_user" class="btn btn-success btn-block" value="Guardar usuario">

        </form>

      </div>
    </div>

    <div class="col-md-8">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Creado en</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuarios";
          $result_users = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_users)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?> </td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>

</main>

<?php include('includes/footer.php'); ?>
