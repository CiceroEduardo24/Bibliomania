<?php
ob_start();
require_once"conectar.php";
$cod = $_GET['id_p'];
$s = "DELETE FROM pedidos WHERE id_p = $cod;";
mysqli_query($conexao,$s);
header("Location:pedidoadmin.php");
ob_end_flush();?>