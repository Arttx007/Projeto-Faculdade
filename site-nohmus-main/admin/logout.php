<?php 
//inicia sessão
session_start();

//destruir a sessão(deixar de existir no caso)
session_unset();
session_destroy();

//voltar pro login
header( "Location: login.php");
exit;
?>