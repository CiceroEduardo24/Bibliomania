<?php
ob_start();
require_once"conectar.php";
$cod = $_GET['id_categ'];
$s = "DELETE FROM categorias WHERE id_categ = $cod;";
mysqli_query($conexao,$s);
header("Location:telaadmin.php");
ob_end_flush();
?>