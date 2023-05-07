<?php
ob_start();
require_once"conectar.php";
$cod = $_GET['id_li'];
$hh="SELECT*FROM livros WHERE id_li=$cod;";
$consulta=mysqli_query($conexao,$hh);
$abc=mysqli_fetch_assoc($consulta);
$t=$abc['c_arquivo'];
$ff=$abc['img_li'];
$resultado = @unlink($t);
$resultad = @unlink($ff);
$s = "DELETE FROM livros WHERE id_li = $cod;";
mysqli_query($conexao,$s);
header("Location:telaadmin.php");
ob_end_flush();
?>