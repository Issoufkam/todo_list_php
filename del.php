<?php
require 'db/conexion.php';
$id = $_GET['id'];
$sql = 'DELETE FROM agenda WHERE id=:id';
$start = $connexion->prepare($sql);
  if (  $start->execute([':id' => $id])) {
    header("Location: /php");
  }
?>