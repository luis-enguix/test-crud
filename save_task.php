<?php
$nombre= $_POST['nombre'];


include('db.php');

if(!empty($_POST['nombre'])&& !empty($_POST['descripcion'])){

if (isset($_POST['guardar_user'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $query = "INSERT INTO task(title, description) VALUES ('$nombre', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Datos creados correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}
} else{
  $_SESSION['message'] = 'Debe completar todos los campos';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}
?>
