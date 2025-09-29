<?php
include '../includes/conection.php';
include '../includes/verificaLogin.php';

$id = $_GET['id'];

$conn->query( "DELETE FROM produtos WHERE id = $id");

header("Location: dashboard.php"); 

?>