<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  //$query = "DELETE FROM task WHERE id = $id";
  $query= "UPDATE task SET estado = CASE WHEN estado = 'Activo' THEN 'Inactivo' 
  WHEN estado = 'Inactivo' THEN 'Activo' END WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Estado Actualizado';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
