<?php 
	require_once "play.php";
	unset($_SESSION['usuario']);
	header("Location:index.php");
?>