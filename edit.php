<?php
include("db.php");
$nombre = '';
$descripcion= '';
$estado='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['title'];
    $descripcion = $row['description'];
    $estado=$row['estado'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $estado=$_POST['estado'];

  $query = "UPDATE task set title = '$nombre', description = '$descripcion', estado = '$estado' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Datos actualizados correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
        <div class="alert alert-info" role="alert" style="text-align:center;">
          Ventana de Actualización
        </div>
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <div class="form-group">
          <!--<input name="estado" type="text" class="form-control" value="<?php //echo $estado; ?>" placeholder="Update Title">-->
          <select name="estado" id="" class="form-control" value="<?php echo $estado; ?>">
			    <option value="Activo">Activo</option>
			    <option value="Inactivo">Inactivo</option>
		      </select>
        </div>
        <button class="btn btn-success btn-block" name="actualizar">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
